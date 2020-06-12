package kelompok3.webservice;
import kelompok3.webservice.model.DapurBunda;
import kelompok3.webservice.model.DapurBundaModel;

import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

@Path("json")
public class DapurBundaAction {
    private DapurBundaModel model = new DapurBundaModel();
    @GET
    @Path("/get")
    @Produces(MediaType.APPLICATION_JSON)
    public Map<String,Object> getBahan(){
        String hello = "";
        ArrayList<DapurBunda> bahan = model.getBahan();
        Map<String, Object> mapData = new HashMap<>();
        mapData.put("data", bahan);
        mapData.put("success",true);
        mapData.put("message","Data Bahan berhasil diambil.");
        return mapData;
    }

    @GET
    @Path("/get/{DapurBundaId}")
    @Produces(MediaType.APPLICATION_JSON)
    public Map<String,Object> getBahanSingle(@PathParam("DapurBundaId") String DapurBundaId){
        String hello = "";
        DapurBunda bahan = model.getBahanSingle(DapurBundaId);
        Map<String,Object> mapData = new HashMap<>();
        mapData.put("data", bahan);
        if(bahan.getId() == 0){
            mapData.put("succes",false);
            mapData.put("message","Data Bahan tidak ditemukan.");
        }else{
            mapData.put("succes",true);
            mapData.put("message","Data Bahan berhasil diambil.");
        }
        return mapData;
    }

    @POST
    @Path("/update/{DapurBundaId}/json")
    @Produces(MediaType.APPLICATION_JSON + ";charset=utf-8")
    @Consumes({MediaType.APPLICATION_JSON})
    public Map<String,Object> updateBahan(final Map<String, Object> param,@PathParam("DapurBundaId") int DapurBundaId){
        DapurBunda bahan = new DapurBunda();
        Map<String,Object> mapData = new HashMap<>();
        bahan.setId(DapurBundaId);
        if(param.containsKey("nama")) bahan.setNama(param.get("nama").toString());
        if(param.containsKey("kategori")) bahan.setKategori(param.get("kategori").toString());
        if(param.containsKey("harga")) bahan.setHarga(Integer.parseInt(param.get("harga").toString()));
        int result = model.updateBahan(bahan);
        if(result > 0){
            mapData.put("succes",true);
            mapData.put("message","Data Bahan berhasil diperbaharui.");
            mapData.put("data", bahan);
        }else{
            mapData.put("succes",false);
            mapData.put("message","Terjadi kesalahan dalam memperbaharui data bahan.");
        }
        return mapData;
    }

    @POST
    @Path("/update/{DapurBundaId}")
    @Produces(MediaType.APPLICATION_JSON + ";charset=utf-8")
    @Consumes("application/x-www-form-urlencoded")
    public Map<String,Object> updateBahanForm(@BeanParam DapurBunda bahan){
        Map<String,Object> mapData = new HashMap<>();

        int result = model.updateBahan(bahan);
        if(result > 0){
            mapData.put("success", true);
            mapData.put("message", "Data bahan berhasil diperbaharui.");
            mapData.put("data",bahan);
        }else{
            mapData.put("succes",false);
            mapData.put("message","Terjadi kesalahan dalam memperbaharui data bahan.");
        }
        return mapData;
    }

    @POST
    @Path("/create/json")
    @Produces(MediaType.APPLICATION_JSON + ";charse=utf-8")
    @Consumes({MediaType.APPLICATION_JSON})
    public Map<String,Object> saveBahan(final Map<String,Object> param){
        DapurBunda bahan = new DapurBunda();
        Map<String,Object> mapData = new HashMap<>();
        if(param.containsKey("nama")) bahan.setNama(param.get("nama").toString());
        if(param.containsKey("kategori")) bahan.setNama(param.get("kategori").toString());
        if(param.containsKey("harga")) bahan.setHarga(Integer.parseInt(param.get("harga").toString()));
        DapurBunda result = model.insertBahan(bahan);
        if(result.getId() > 0){
            mapData.put("success",true);
            mapData.put("message","Data bahan berhasil disimpan.");
            mapData.put("data",result);
        }else{
            mapData.put("success",false);
            mapData.put("message","Terjadi kesalahan dalam menyimpan data bahan.");
        }
        return mapData;
    }

    @POST
    @Path("/create/")
    @Produces(MediaType.APPLICATION_JSON + ";charset=utf-8")
    @Consumes("application/x-www-form-urlencoded")
    public Map<String,Object> saveBahanForm(@BeanParam DapurBunda bahan){
        Map<String,Object> mapData = new HashMap<>();
        DapurBunda result = model.insertBahan(bahan);
        if(result.getId() > 0){
            mapData.put("success",true);
            mapData.put("message","Data bahan berhasil disimpan.");
            mapData.put("data",result);
        }else{
            mapData.put("success",false);
            mapData.put("message","Terjadi kesalahan dalam menyimpan data bahan.");
        }
        return mapData;
    }

    @DELETE
    @Path("/delete/{DapurBundaId}")
    @Produces(MediaType.APPLICATION_JSON)
    public Map<String,Object> deleteFilm(@PathParam("DapurBundaId") int DapurBundaId){
        int result = model.deleteBahan(DapurBundaId);
        Map<String,Object> mapData = new HashMap<>();
        if(result == 0) {
            mapData.put("success", false);
            mapData.put("message", "Terjadi kesalahan dalam menghapus bahan.");
        }else{
            mapData.put("success",true);
            mapData.put("message","Data bahan berhasil dihapus.");
        }
        return mapData;
    }
}
