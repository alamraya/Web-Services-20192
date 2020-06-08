package com.dewi_fadilah_sheilaa.ecommerce.repository;

import android.arch.lifecycle.MutableLiveData;
import android.util.Log;

import com.dewi_fadilah_sheilaa.ecommerce.model.CartItem;
import com.dewi_fadilah_sheilaa.ecommerce.model.CartResponse;
import com.dewi_fadilah_sheilaa.ecommerce.network.RetrofetClient;

import java.util.ArrayList;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class CartItemsRepository {
    private MutableLiveData<CartResponse> cartItems;
    private static CartItemsRepository cartItemsRepository;

    public static CartItemsRepository getInstance(){
        if (cartItemsRepository==null)
            cartItemsRepository=new CartItemsRepository();
        return cartItemsRepository;
    }

    public MutableLiveData<CartResponse> getCartItems(String ids,String q,String page){
        Log.d("CARRTTT","request  ");
        cartItems=new MutableLiveData<>();
        RetrofetClient.getApiService()
                .getCartItems(ids,q,page)
                .enqueue(new Callback<CartResponse>() {
                    @Override
                    public void onResponse(Call<CartResponse> call, Response<CartResponse> response) {
                        cartItems.setValue(response.body());
                    }

                    @Override
                    public void onFailure(Call<CartResponse> call, Throwable t) {

                    }
                });
        return cartItems;
    }

    public MutableLiveData<CartResponse> getCartItems() {
        return cartItems;
    }
}
