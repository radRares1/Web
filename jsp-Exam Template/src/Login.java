

import Controllers.DBController;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;

@WebServlet("/Login")
public class Login extends HttpServlet {

    private DBController db = new DBController();

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String user =  request.getParameter("name");
        String pw  = request.getParameter("pass");

        if (db.logIn(user, pw).isPresent())
        {

            response.sendRedirect("/success.jsp");

        }
        else
        {
            response.sendRedirect("/index.jsp");
        }

    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

    }
}