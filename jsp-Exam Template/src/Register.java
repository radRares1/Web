

import Controllers.DBController;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;

@WebServlet("/Register")
public class Register extends HttpServlet {

    private DBController db = new DBController();


    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

        String user =   request.getParameter("user");
        String pw  = request.getParameter("pw");

        System.out.println(user);
        if(db.register(user, pw))
        {
            response.sendRedirect("welcome.jsp");
        }
        else
        {
            response.sendRedirect("index.jsp");
        }
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

    }

}
