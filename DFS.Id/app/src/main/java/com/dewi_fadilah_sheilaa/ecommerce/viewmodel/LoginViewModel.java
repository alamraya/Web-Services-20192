package com.dewi_fadilah_sheilaa.ecommerce.viewmodel;

import android.arch.lifecycle.MutableLiveData;
import android.arch.lifecycle.ViewModel;

import com.dewi_fadilah_sheilaa.ecommerce.model.Response;
import com.dewi_fadilah_sheilaa.ecommerce.repository.LoginRepository;

public class LoginViewModel extends ViewModel{

    MutableLiveData<Boolean>isLoading;
    private MutableLiveData<Response> response=new MutableLiveData<>();
    MutableLiveData<String> error=new MutableLiveData<>();


    public void login(String email,String password) {
            response=LoginRepository.getInstance().login(email,password);
    }

    public MutableLiveData<Boolean> getIsLoading() {
        return LoginRepository.getInstance().getIsLoading();
    }

    public MutableLiveData<String> getError() {
        return LoginRepository.getInstance().getError();
    }

    public MutableLiveData<Response> getResponse() {
        return response;
    }
}
