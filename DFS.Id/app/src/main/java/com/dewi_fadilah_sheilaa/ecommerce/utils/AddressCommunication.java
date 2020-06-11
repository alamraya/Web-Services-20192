package com.dewi_fadilah_sheilaa.ecommerce.utils;

import com.dewi_fadilah_sheilaa.ecommerce.model.Address;
import com.dewi_fadilah_sheilaa.ecommerce.model.AddressItem;

public interface AddressCommunication {
    public void selectAddress(AddressItem addressItem);

    void editAddress(AddressItem addressItem);

    void deleteAddress(AddressItem addressItem);
}
