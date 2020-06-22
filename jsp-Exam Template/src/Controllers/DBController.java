package Controllers;

import Model.Asset;
import Model.Asset2;
import Model.AssetDto;
import Model.User;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

public class DBController {

    private Statement stmt;
    private static User currentUser;
    private Connection conn;

    public DBController() {
        connect();
    }

    public void connect() {
        try {
            Connection con = DriverManager.getConnection("jdbc:postgresql://localhost:5432/web8", "postgres", "admin");
            this.conn=con;
            stmt = con.createStatement();
        } catch (Exception ex) {
            System.out.println("eroare la connect:" + ex.getMessage());
            ex.printStackTrace();
        }
    }

    public User getCurrentUser()
    {
        return currentUser;
    }

    public void logOut()
    {
        currentUser = null;
    }

    public ArrayList<Asset> getAssets()
    {
        ArrayList<Asset> list = new ArrayList<Asset>();
        ResultSet rs;
        Asset a = null;
        try {

            rs = stmt.executeQuery("select * from assets where userid='"+currentUser.getId()+"'");
            while (rs.next()) {
                a = new Asset(rs.getInt("aid"),rs.getInt("userid"), rs.getString("name"), rs.getString("description"),rs.getInt("value"));
                list.add(a);
            }
            rs.close();
        } catch (SQLException e) {
            System.out.println("error");
            e.printStackTrace();
        }
        return list;
    }

    public Optional<User> logIn(String username, String password) {
        ResultSet rs;
        User u = null;
        Optional<User> o = Optional.empty();
        System.out.println(username + " " + password);
        try {
            rs = stmt.executeQuery("select * from users where password='"+password+"' and uname='"+username+"'");
            if (rs.next()) {
                u = new User(rs.getInt("id"), rs.getString("uname"), rs.getString("password"));

                this.setCurrentUser(u);
                o = Optional.of(u);
                return o;
            }

            rs.close();
        } catch (SQLException e) {

            e.printStackTrace();
        }
        return o;
    }

//    public void updateAsset(AssetDto asset) throws SQLException
//    {UPDATE EMPLOYEE SET NAME=? WHERE NAME=?"
//        String SQL = "UPDATE assets SET )";
//        try {
//
//            PreparedStatement pstmt = conn.prepareStatement(SQL,
//                    Statement.RETURN_GENERATED_KEYS);
//            pstmt.setInt(1,currentUser.getId());
//            pstmt.setString(2, asset.getName());
//            pstmt.setString(3, asset.getDesc());
//            pstmt.setInt(4,asset.getValue());
//            pstmt.executeUpdate();
//
//        } catch (SQLException e) {
//
//            e.printStackTrace();
//        }
//    }

    public void addAsset(AssetDto asset) throws SQLException {
        String SQL = "INSERT INTO assets(userid,name,description,value) "
                + "VALUES(?,?,?,?)";
        try {

            PreparedStatement pstmt = conn.prepareStatement(SQL,
                    Statement.RETURN_GENERATED_KEYS);
                pstmt.setInt(1,currentUser.getId());
                pstmt.setString(2, asset.getName());
                pstmt.setString(3, asset.getDesc());
                pstmt.setInt(4,asset.getValue());
                pstmt.executeUpdate();

        } catch (SQLException e) {

            e.printStackTrace();
        }
    }

    public boolean register(String username, String password) {
        int rs;
        System.out.println(username + " " + password);
        try {
            rs = stmt.executeUpdate("insert into users(uname,password) values('"+username+"','"+password+"')");

            return rs>0;
        } catch (SQLException e) {

            e.printStackTrace();
            return false;
        }
    }

    public void setCurrentUser(User user) {
        currentUser = user;
    }

    public void updateAsset(Asset2 a) {
        String SQL = "UPDATE assets SET name=?,description=?,value=? WHERE aid=?";
        try {

            PreparedStatement pstmt = conn.prepareStatement(SQL,
                    Statement.RETURN_GENERATED_KEYS);
            pstmt.setString(1, a.getName());
            pstmt.setString(2, a.getDesc());
            pstmt.setInt(3,a.getValue());
            pstmt.setInt(4,a.getId());
            pstmt.executeUpdate();

        } catch (SQLException e) {

            e.printStackTrace();
        }

    }

    public void deleteAsset(int id) {
        String SQL = "DELETE FROM assets WHERE aid=?";
        try {

            PreparedStatement pstmt = conn.prepareStatement(SQL,
                    Statement.RETURN_GENERATED_KEYS);
            pstmt.setInt(1,id);
            pstmt.executeUpdate();

        } catch (SQLException e) {

            e.printStackTrace();
        }
    }
}
