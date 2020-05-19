package Controller;

import Model.User;

import java.sql.*;
import java.util.Optional;

import java.sql.DriverManager;

public class DBController {

    private Statement stmt;

    public DBController() {
        connect();
    }

    public void connect() {
        try {
            Connection con = DriverManager.getConnection("jdbc:postgresql://localhost:5432/web8", "postgres", "admin");
            stmt = con.createStatement();
        } catch (Exception ex) {
            System.out.println("eroare la connect:" + ex.getMessage());
            ex.printStackTrace();
        }
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
                o = Optional.of(u);
                return o;
            }
            rs.close();
        } catch (SQLException e) {

            e.printStackTrace();
        }
        return o;
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

}
