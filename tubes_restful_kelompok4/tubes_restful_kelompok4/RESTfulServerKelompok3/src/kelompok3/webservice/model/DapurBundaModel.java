package kelompok3.webservice.model;

import java.sql.ResultSet;
import java.util.ArrayList;

public class DapurBundaModel {

    public ArrayList<DapurBunda> bahanArrayList;

    public DapurBundaModel() {bahanArrayList = new ArrayList<>();}

    public ArrayList<DapurBunda> getBahan(){
        try{
            ResultSet result = Connection.ExecuteQuery("SELECT * FROM bahan");
            bahanArrayList.clear();
            while (result.next()){
                DapurBunda bahan = new DapurBunda();
                bahan.setId(result.getInt("id"));
                bahan.setNama(result.getString("nama"));
                bahan.setKategori(result.getString("kategori"));
                bahan.setHarga(result.getInt("harga"));
                bahanArrayList.add(bahan);
            }
            return bahanArrayList;
        } catch (Exception e){
            System.out.println(e);
        }
        return bahanArrayList;
    }

    public DapurBunda getBahanSingle(String DapurBundaId){
        DapurBunda bahan = new DapurBunda();
        try {
            ResultSet result = Connection.ExecuteQuery("SELECT * FROM bahan WHERE id = '"+DapurBundaId+"'");
            if(result.next()){
                bahan.setId(result.getInt("id"));
                bahan.setNama(result.getString("nama"));
                bahan.setKategori(result.getString("kategori"));
                bahan.setHarga(result.getInt("harga"));
            }
        }catch (Exception e){
            System.out.println(e);
        }
        return bahan;
    }

    public int updateBahan(DapurBunda bahan){
        String query = "UPDATE bahan SET ";
        String[] param = new String[4];
        int index = 0;
        if(!bahan.getNama().isEmpty()){query += "nama = ? "; param[index] = bahan.getNama(); index++;}
        if(!bahan.getNama().isEmpty()){query += ",kategori = ? "; param[index] = bahan.getKategori(); index++;}
        if(!bahan.getNama().isEmpty()){query += ",harga = ? "; param[index] = String.valueOf(bahan.getHarga()); index++;}
        if(!bahan.getNama().isEmpty()){query += "WHERE id = ? "; param[index] = String.valueOf(bahan.getId()); index++;}

        int result = Connection.Execute(query, param, false);
        return result;
    }

    public DapurBunda insertBahan(DapurBunda bahan){
        String query = "INSERT INTO bahan SET ";
        String[] param = new String[3];
        int index = 0;
        if(!bahan.getNama().isEmpty()){query += "nama = ? "; param[index] = bahan.getNama(); index++;}
        if(!bahan.getNama().isEmpty()){query += ",kategori = ? "; param[index] = bahan.getKategori(); index++;}
        if(!bahan.getNama().isEmpty()){query += ",harga = ? "; param[index] = String.valueOf(bahan.getHarga()); index++;}
        int result = Connection.Execute(query,param,true);
        bahan.setId(result);
        return bahan;
    }

    public int deleteBahan(int DapurBundaId){
        int i = 0;
        String query = "DELETE FROM bahan WHERE id = ?";
        String[] param = {String.valueOf(DapurBundaId)};
        i = Connection.Execute(query,param,false);
        return i;
    }
}
