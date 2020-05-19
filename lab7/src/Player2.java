import Controller.GameController;
import Model.Player;
import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

@WebServlet("/Player2")
public class Player2 extends HttpServlet {


    GameController game = GameController.getInstance();

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

        int i = Integer.parseInt(request.getParameter("i"));
        int j = Integer.parseInt(request.getParameter("j"));

        System.out.println(game.getPlayer1().hit(i,j));

        if(!game.getPlayer2().youLost() && game.getPlayer1().youLost())
            response.sendRedirect("/win.jsp");
        else
        if(game.getPlayer2().youLost() && !game.getPlayer1().youLost())
            response.sendRedirect("/lost.jsp");

        else
            response.sendRedirect("/player2.jsp");

    }



    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {


        String array = new Gson().toJson(game.getPlayer1().getBoard());

        response.setContentType("application/json");
        response.setCharacterEncoding("UTF-8");
        response.getWriter().write(array);

    }
}
