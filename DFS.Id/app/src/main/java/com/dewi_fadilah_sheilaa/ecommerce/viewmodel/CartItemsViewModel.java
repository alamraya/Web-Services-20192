package com.dewi_fadilah_sheilaa.ecommerce.viewmodel;

import android.arch.lifecycle.MutableLiveData;
import android.arch.lifecycle.ViewModel;
import android.util.Log;

import com.dewi_fadilah_sheilaa.ecommerce.model.CartResponse;
import com.dewi_fadilah_sheilaa.ecommerce.repository.CartItemsRepository;

public class CartItemsViewModel extends ViewModel {

    private MutableLiveData<CartResponse> cartItems;

    public MutableLiveData<CartResponse> getCartItems(String ids,String q,String page){
           cartItems=CartItemsRepository.getInstance().getCartItems(ids,q,page);
       return cartItems;
    }

    public MutableLiveData<CartResponse> getCartItems() {
        return cartItems;
    }

    @Override
    protected void onCleared() {
        super.onCleared();
        Log.d("CARRTTT","onCleared  ");

    }
}
