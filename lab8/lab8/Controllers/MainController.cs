using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using lab8.DataAbstractionLayer;
using lab8.Models;


namespace lab8.Controllers
{
    public class MainController : Controller
    {
        // GET: Main
        public ActionResult Index()
        {
            return View("FilterRecepies");
        }

        
        public string getAllRecepies()
        {
            DAL dal = new DAL();
            List<Recepie> rlist = dal.getAll() ;
            ViewData["recepieList"] = rlist;

            string result = "<table><thead><th>Id</th><th>Title</th><th>Description</th><th>Type</th></thead>";


            foreach (Recepie recepie in rlist)
            {
                result += "<tr><td>" + recepie.Id + "</td><td>" + recepie.Title + "</td><td>" + recepie.Description + "</td><td>" + recepie.Type + "</td><td><button class='deleteButton' >delete</button><td><button class='updateButton' >update</button></tr>";
            }

            result += "</table>";
            

            return result;
        }

        public void addRecepie()
        {
            string title = Request.Params["title"];
            string desc = Request.Params["desc"];
            string type = Request.Params["type"];
            DAL dal = new DAL();

            dal.addRecepie(title, desc, type);
                
        }

        public void updateRecepie()
        {
            int id = Convert.ToInt32(Request.Params["id"]);
            string title = Request.Params["title"];
            string desc = Request.Params["desc"];
            string type = Request.Params["type"];
            DAL dal = new DAL();

            dal.updateRecepie(id,title, desc, type);

        }

        public void deleteRecepie()
        {
            int id = Convert.ToInt32(Request.Params["id"]);
            DAL dal = new DAL();

            dal.delete(id);

        }


        public string filterRecepies()
        {
            string recepieType = Request.Params["recepieType"];
            DAL dal = new DAL();
            List<Recepie> rlist = dal.GetRecepiesForMain(recepieType);
            ViewData["recepieList"] = rlist;

            string result = "<table><thead><th>Id</th><th>Title</th><th>Description</th><th>Type</th></thead>";

            
            foreach (Recepie recepie in rlist)
            {
                result += "<tr><td id='id'>" + recepie.Id + "</td><td>" + recepie.Title + "</td><td>" + recepie.Description + "</td><td>" + recepie.Type + "</td><td><button class='deleteButton' >delete</button><td><button class='updateButton' >update</button></tr>";
            }

            result += "</table>";

            return result;

        }
    }
}