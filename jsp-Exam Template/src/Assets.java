import Controllers.DBController;
import Model.Asset;
import Model.Asset2;
import Model.AssetDto;
import com.fasterxml.jackson.core.type.TypeReference;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.google.gson.Gson;
import com.google.gson.JsonObject;
import org.json.simple.*;
import org.json.simple.JSONObject;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.List;

@WebServlet("/Assets")
public class Assets extends HttpServlet {

    private DBController db = new DBController();

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {


        String action = request.getParameter("action");
        if ((action != null) && action.equals("addAssets")) {
            String assetsToAdd = request.getParameter("assetsToAdd");
            System.out.println("received post");

            Gson gson = new Gson();
            AssetDto[] data = gson.fromJson(assetsToAdd, AssetDto[].class);
            for (AssetDto asset : data) {
                try {
                    db.addAsset(asset);
                }
                catch (SQLException e)
                {
                    System.out.println("whoops");
                }
            }
        }

        else if ((action != null) && action.equals("updateAsset")) {

            String assetsToUpdate = request.getParameter("assetToUpdate");
            System.out.println(assetsToUpdate);

            Gson gson = new Gson();
            System.out.println("o");

            Asset2[] data = gson.fromJson(assetsToUpdate, Asset2[].class);
            System.out.println(data[0]);

            db.updateAsset(data[0]);
        }

        else if ((action != null) && action.equals("deleteAsset")) {

            String id = request.getParameter("idToDelete");
            System.out.println(id);

            db.deleteAsset(Integer.parseInt(id));
        }
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

            ArrayList<Asset> assets = db.getAssets();
            Gson gson = new Gson();
            String assetsJson = gson.toJson(assets);

            response.setContentType("application/json");
            response.setCharacterEncoding("UTF-8");
            response.getWriter().write(assetsJson);


    }


}
