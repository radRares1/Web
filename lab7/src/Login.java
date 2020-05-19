import Controller.DBController;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.util.Optional;

@WebServlet("/Login")
public class Login extends HttpServlet {

    private DBController db = new DBController();
    private int loginCount = 1;

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
      String user =  request.getParameter("name");
      String pw  = request.getParameter("pass");

      if (db.logIn(user, pw).isPresent())
      {
          if(loginCount == 1) {
              response.sendRedirect("/player1.jsp");
              loginCount++;
          }
          else
              if(loginCount==2)
              {
                  response.sendRedirect("/player2.jsp");
                  loginCount++;
              }
              else
              {
                  response.sendRedirect("/error.jsp");
                  loginCount=0;
              }
      }
      else
      {
          response.sendRedirect("/noUser.jsp");
      }

    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

    }
}
