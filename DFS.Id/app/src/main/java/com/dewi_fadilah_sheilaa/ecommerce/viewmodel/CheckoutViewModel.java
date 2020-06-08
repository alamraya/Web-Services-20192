package com.dewi_fadilah_sheilaa.ecommerce.viewmodel;
import android.arch.lifecycle.MutableLiveData;
import android.arch.lifecycle.ViewModel;
import android.content.Context;

import com.dewi_fadilah_sheilaa.ecommerce.model.CartItem;
import com.dewi_fadilah_sheilaa.ecommerce.utils.CartItemsManger;

import java.util.List;

public class CheckoutViewModel extends ViewModel {

    private MutableLiveData<Integer> shippingOption,paymentOption;
    private MutableLiveData<Integer> shippingAddress;



    public void init(){
        if(shippingOption == null){
            shippingOption = new MutableLiveData<>();
            shippingOption.setValue(-1);
        }

        if(paymentOption == null){
            paymentOption = new MutableLiveData<>();
            paymentOption.setValue(-1);
        }

        if(shippingAddress == null){
            shippingAddress = new MutableLiveData<>();
            shippingAddress.setValue(-1);
        }

    }

    private List<CartItem> loadCartFromSharedPref(Context context) {
        CartItemsManger cartItemsManger = CartItemsManger.getInstance(context);
        return cartItemsManger.getCartItems();

    }
    public void setShippingOption(int option){
        shippingOption.setValue(option);
    }

    public MutableLiveData<Integer> getShippingOption() {
        return shippingOption;
    }

    public void setPaymentOption(int option){
        paymentOption.setValue(option);
    }

    public MutableLiveData<Integer> getPaymentOption() {
        return paymentOption;
    }

    public void setShippingAddress(int id) {
        shippingAddress.setValue(id);

    }

    public MutableLiveData<Integer> getShippingAddress() {
        return shippingAddress;
    }



}
