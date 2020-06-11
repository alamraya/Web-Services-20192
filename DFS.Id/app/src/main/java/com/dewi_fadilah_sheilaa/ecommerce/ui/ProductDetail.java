package com.dewi_fadilah_sheilaa.ecommerce.ui;

import android.content.Intent;
import android.graphics.Paint;
import android.graphics.PorterDuff;
import android.graphics.Typeface;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
import android.support.v4.widget.TextViewCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.dewi_fadilah_sheilaa.ecommerce.adapter.DetailsPageAdapter;
import com.dewi_fadilah_sheilaa.ecommerce.R;
import com.dewi_fadilah_sheilaa.ecommerce.adapter.SlideShowAdapter;
import com.dewi_fadilah_sheilaa.ecommerce.model.CartItem;
import com.dewi_fadilah_sheilaa.ecommerce.model.Media;
import com.dewi_fadilah_sheilaa.ecommerce.model.Product;
import com.dewi_fadilah_sheilaa.ecommerce.network.RetrofetClient;
import com.dewi_fadilah_sheilaa.ecommerce.utils.CartItemsManger;
import com.dewi_fadilah_sheilaa.ecommerce.utils.SessionManager;
import com.rd.PageIndicatorView;
import com.rd.animation.type.AnimationType;

import java.util.ArrayList;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ProductDetail extends AppCompatActivity {
    TextView name,seller,price,price_after;
    Button addToCart;
    Toolbar toolbar;
    ViewPager viewPager,detailsViewpager;
    TabLayout tabLayout;
    SlideShowAdapter slideShowAdapter;
    PageIndicatorView indicator;

    public static final String PRODUCT_KEY="product_key";
    public Product product;
    private TextView badgeTV;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_detail);
        toolbar = findViewById(R.id.toolBar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        toolbar.getNavigationIcon().setColorFilter(getResources().getColor(R.color.white)
                , PorterDuff.Mode.SRC_ATOP);
        viewPager = findViewById(R.id.productImagesPager);
        detailsViewpager = findViewById(R.id.productDetail_viewPager);
        tabLayout=findViewById(R.id.product_tabLayout);
        indicator=findViewById(R.id.productpagerIndicatorView);
        name = findViewById(R.id.product_name);
        seller = findViewById(R.id.seller);
        price = findViewById(R.id.productDetail_Price);
        price_after = findViewById(R.id.productDetail_price_after);
        addToCart = findViewById(R.id.addToCart);



        if (getIntent()!=null && getIntent().hasExtra(PRODUCT_KEY)){
            product=getIntent().getParcelableExtra(PRODUCT_KEY);
            populateData(product);
        }

        slideShowAdapter = new SlideShowAdapter(this,product.getMedia());
        viewPager.setAdapter(slideShowAdapter);
        indicator.setAnimationType(AnimationType.WORM);
        addToCart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (product!=null){
                    CartItemsManger cartItemsManger=CartItemsManger.getInstance(getApplicationContext());
                    ArrayList<CartItem> cartItems=cartItemsManger.getCartItems();
                    if (cartItems!=null&&cartItems.contains(new CartItem(product,1))){
                        Toast.makeText(ProductDetail.this, "already exist", Toast.LENGTH_SHORT).show();
                    }else{
                        Toast.makeText(getApplicationContext(),"added to cart ",Toast.LENGTH_SHORT).show();
                        cartItemsManger.saveCartItem(product.getId(),1);
                        int count=(Integer.parseInt(badgeTV.getText().toString()))+1;
                        badgeTV.setText(String.valueOf(count));

                    }

                }else{
                    Toast.makeText(getApplicationContext(),"error ",Toast.LENGTH_SHORT).show();
                }
            }
            });
        DetailsPageAdapter detailsPageAdapter=new DetailsPageAdapter(getSupportFragmentManager());
        detailsViewpager.setAdapter(detailsPageAdapter);
        tabLayout.setupWithViewPager(detailsViewpager);


        viewPager.addOnPageChangeListener(new ViewPager.OnPageChangeListener() {
            @Override
            public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {

            }

            @Override
            public void onPageSelected(int position) {
                indicator.setSelection(position);
            }

            @Override
            public void onPageScrollStateChanged(int state) {

            }
        });

    }


    void populateData(Product product){
        name.setText(product.getName());
        price.setText(getString(R.string.product_price,product.getPrice()));
        if (product.getPrice_after()!=null){
            price_after.setVisibility(View.VISIBLE);
            price.setPaintFlags(price.getPaintFlags() | Paint.STRIKE_THRU_TEXT_FLAG);
            price_after.setText(getString(R.string.product_price,product.getPrice_after()));
            TextViewCompat.setTextAppearance(price, android.R.style.TextAppearance_DeviceDefault_Medium);
            name.setTypeface(null, Typeface.NORMAL);
        }


        seller.setText(getString(R.string.seller,product.getSellerName()));
        if (product.getMedia()!=null&&!product.getMedia().isEmpty())
        indicator.setCount(product.getMedia().size());
    }

    void dummyProduct(){
        ArrayList<Media> media=new ArrayList<>();
        media.add(new Media(1,"http://192.168.42.28/Ecommerce_server/img/celana.jpg"));
        media.add(new Media(2,"http://192.168.42.28/Ecommerce_server/img/dress.jpg"));
        //product=new Product(1,1,50,200,1,"flower","12-12-2012","this is a red flower ",media);

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.detail_menu,menu);
        final MenuItem menuItem = menu.findItem(R.id.detail_cart);
        View actionView = menuItem.getActionView();
        badgeTV=actionView.findViewById(R.id.cartCount);
        setupBadge(badgeTV);

        actionView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                onOptionsItemSelected(menuItem);
            }
        });

        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId()==R.id.detail_cart){
            Intent intent=new Intent(this,CartActivity.class);
            startActivity(intent);
        }
        else if (item.getItemId()==android.R.id.home){
            onBackPressed();
        }
        return true;
    }

    void setupBadge(TextView countTV){
        CartItemsManger cartItemsManger=CartItemsManger.getInstance(this);
        ArrayList<CartItem> cartItems=cartItemsManger.getCartItems();
        if (cartItems==null||cartItems.isEmpty()){
            countTV.setText("0");
            countTV.setVisibility(View.GONE);
        }else{
            countTV.setVisibility(View.VISIBLE);
            countTV.setText(String.valueOf(cartItems.size()));
        }
    }



}
