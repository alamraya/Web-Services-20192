package com.dewi_fadilah_sheilaa.ecommerce.network;

import com.dewi_fadilah_sheilaa.ecommerce.model.Address;
import com.dewi_fadilah_sheilaa.ecommerce.model.CartResponse;
import com.dewi_fadilah_sheilaa.ecommerce.model.Checkout;
import com.dewi_fadilah_sheilaa.ecommerce.model.Order;
import com.dewi_fadilah_sheilaa.ecommerce.model.Product;
import com.dewi_fadilah_sheilaa.ecommerce.model.Ad;
import com.dewi_fadilah_sheilaa.ecommerce.model.Category;
import com.dewi_fadilah_sheilaa.ecommerce.model.Response;
import com.dewi_fadilah_sheilaa.ecommerce.model.Review;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Field;

import retrofit2.http.FieldMap;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.Query;

public interface ApiService {

    @FormUrlEncoded
    @POST("http://192.168.42.28/Ecommerce_server/login.php")
    Call<Response> login(@Field("email") String email,
                         @Field("password") String password);

    @FormUrlEncoded
    @POST(Constants.SIGNUP_URL)
    public Call<Response> signup(@Field("name") String name, @Field("email") String email,
                                 @Field("password") String password);

    @GET(Constants.CATEGORY_URL)
    Call<ArrayList<Category>> getCategories();

    @GET("http://192.168.42.28/Ecommerce_server/cart.php")
    Call<CartResponse> getCartItems(@Query("ids") String ids, @Query("q") String q, @Query("page") String page);

    @GET ("http://192.168.42.28/Ecommerce_server/products.php")
    Call <ArrayList<Product>> getProducts(@Query("categoryId") String categoryId,@Query("page") int page,
                                        @Query("orderBy") String sortBy,@Query("order") String sort) ;

    @GET("http://192.168.42.28/Ecommerce_server/ads.php")
    Call<ArrayList<Ad>> getAds();

    @GET("http://192.168.42.28/Ecommerce_server/recentlyAdded.php")
    Call<ArrayList<Product>> getRecentlyAddedProducts(@Query("page") int page);


    @GET(Constants.ADDRESS)
    Call<List<Address>> getAddresses(@Query("user_id") String userId, @Query("default") String isDefult);

    @FormUrlEncoded
    @POST(Constants.ADDRESS)
    Call<Response> addAddress(@Field("user_id") String userId,@Field("first_name") String firstName,
                              @Field("last_name") String lastName,
                              @Field("phone_number") String phoneNumber,
                              @Field("state") String state,
                              @Field("city") String city, @Field("zip_code") int zipCode,
                              @Field("address_1") String address1, @Field("address_2") String address2
                              );

    @FormUrlEncoded
    @POST(Constants.ADDRESS)
    Call<Response> deleteAddress(@Field("address_id") int addressId);



    @GET("http://192.168.42.28/Ecommerce_server/reviews.php")
    Call<ArrayList<Review>> getReviews(@Query("productId") String productId);

    @FormUrlEncoded
    @POST(Constants.ADDRESS)
    Call<Response> editAddress(@Field("id") String id, @Field("first_name") String first_name,
                               @Field("last_name") String last_name, @Field("phone_number") String phone_number,
                               @Field("state") String state, @Field("city") String city,
                               @Field("address_1") String address_1, @Field("address_2") String address_2,
                               @Field("zip_code") String zip_code);

    @FormUrlEncoded
    @POST(Constants.ADDRESS)
    Call<Response> setDefaultAddress(@Field("user_id") long userId, @Field("address_id") int addressId);

    @POST("http://192.168.42.28/Ecommerce_server/orders.php")
    @FormUrlEncoded
    Call<Order> makeOrder(@Field("orderItems") String orderItems,@Field("quantity") String quantity
            ,@Field("userId") long userId,@Field("address_id") int addressId);

    @GET("http://192.168.42.28/Ecommerce_server/orders.php")
    Call<ArrayList<Order>> getOrders(@Query("userId") String userId);

}
