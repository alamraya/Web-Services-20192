package kelompok3.webservice.model;

import javax.ws.rs.FormParam;
import javax.ws.rs.PathParam;

public class DapurBunda {
    @PathParam("DapurBundaId")
    private int id;

    @FormParam("nama")
    private String nama;

    @FormParam("kategori")
    private String kategori;

    @FormParam("harga")
    private int harga;

    public int getId() {return id;}

    public void setId(int id) {this.id = id;}

    public String getNama() {return nama;}

    public void setNama(String nama) {this.nama = nama;}

    public String getKategori() {return kategori;}

    public void setKategori(String kategori) {this.kategori = kategori;}

    public int getHarga() {return harga;}

    public void setHarga(int harga) {this.harga = harga;}
}
