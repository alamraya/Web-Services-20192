package kelompok3.webservice.model;

import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

public class Connection {

    public static java.sql.Connection setKoneksi(){
        String username = "root";
        String password = "haha123";
        String database = "DapurBunda";
        java.sql.Connection cn = null;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            cn = (java.sql.Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/"+database+"?useUnicode=true&useJDBCCompliantTimezoneShift=true&useLegacyDatetimeCode=false&serverTimezone=UTC",username,password);
        } catch (Exception e) {
            System.out.println(e);
        }
        return cn;
    }

    public static int Execute(String SQL, String[] Param, Boolean isInsert){
        int i = 0;
        try{
            java.sql.Connection cn = setKoneksi();
            PreparedStatement st = cn.prepareStatement(SQL, Statement.RETURN_GENERATED_KEYS);
            int index = 1;
            for (String item: Param) {
                st.setString(index, item);
                index++;
            }
            i = st.executeUpdate();
            if(isInsert){
                ResultSet rs = st.getGeneratedKeys();

                if(rs.next()){
                    i=rs.getInt(1);
                }
            }
        }catch (Exception e){
            System.out.println(e);
        }
        return i;
    }

    public static ResultSet ExecuteQuery(String SQL){
        ResultSet rs = null;
        try{
            java.sql.Connection cn = setKoneksi();
            Statement st = cn.createStatement();
            rs = st.executeQuery(SQL);
        }catch (Exception e){
            System.out.println(e);
        }
        return rs;
    }
}
