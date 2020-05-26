using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using lab8.DataAbstractionLayer;

namespace lab8.Controllers
{
    public class LoginController : Controller
    {
        // GET: Login
        public ActionResult Index()
        {
            return View("LoginView");
        }
        

        public ActionResult Login()
        {
            string userName = Request.Params["name"];
            string password = Request.Params["pass"];

            DAL dal = new DAL();

            bool result = dal.login(userName, password);

            System.Diagnostics.Debug.WriteLine(result);

            return Json(new { success = result });
        }

        public ActionResult Register()
        {
            string userName = Request.Params["name"];
            string password = Request.Params["pass"];

            DAL dal = new DAL();

            bool result = dal.register(userName, password);

            System.Diagnostics.Debug.WriteLine(result);

            return Json(new { success = result });
        }
    }
}