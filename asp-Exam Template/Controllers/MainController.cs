using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using lab8.DataAbstractionLayer;
using lab8.Models;
using Newtonsoft.Json;
using System.Diagnostics;

namespace lab8.Controllers
{
    public class MainController : Controller
    {
        // GET: Main
        public ActionResult Index()
        {
            return View("FilterRecepies");
        }

        
        public string getAllAssets()
        {
            DAL dal = new DAL();
            List<Asset> rlist = dal.getAssets() ;
            //ViewData["assetList"] = rlist;

            string result = "<table><thead><th>Id</th><th>Name</th><th>Description</th><th>Value</th></thead>";

            string td;
            foreach (Asset asset in rlist)
            {
                if (asset.Value > 10)
                    td = "<tr bgcolor=#8b0000 >";
                else
                    td = "<tr>";
                result += td+"<td>" + asset.Id + "</td><td>" + asset.Name + "</td><td>" + asset.Description + "</td><td>" + asset.Value + "</td><td><button class='deleteButton' >delete</button><td><button class='updateButton' >update</button></tr>";
            }

            result += "</table>";
            

            return result;
        }
        public void addAssets()
        {
            DAL dal = new DAL();


            List<AssetDto> list = JsonConvert.DeserializeObject<List<AssetDto>>(Request.Params["assetsToAdd"]);
            foreach (AssetDto asset in list)
            {
                Debug.WriteLine(asset.ToString());
                dal.addAsset(asset);
            };
        }

        //public void addRecepie()
        //{
        //    string title = Request.Params["title"];
        //    string desc = Request.Params["desc"];
        //    string type = Request.Params["type"];

        //    DAL dal = new DAL();

        //    dal.addRecepie(title, desc, type);
                
        //}

        public void updateAsset()
        {
            int id = Convert.ToInt32(Request.Params["id"]);
            string name = Request.Params["name"];
            string desc = Request.Params["desc"];
            int val = Convert.ToInt32(Request.Params["value"]);
            DAL dal = new DAL();
            dal.updateAsset(id,name, desc, val);

        }

        public void deleteAsset()
        {
            int id = Convert.ToInt32(Request.Params["id"]);
            DAL dal = new DAL();

            dal.delete(id);

        }


        //public string filterRecepies()
        //{
        //    string recepieType = Request.Params["recepieType"];
        //    DAL dal = new DAL();
        //    List<Recepie> rlist = dal.GetRecepiesForMain(recepieType);
        //    ViewData["recepieList"] = rlist;

        //    string result = "<table><thead><th>Id</th><th>Title</th><th>Description</th><th>Type</th></thead>";

            
        //    foreach (Recepie recepie in rlist)
        //    {
        //        result += "<tr><td id='id'>" + recepie.Id + "</td><td>" + recepie.Title + "</td><td>" + recepie.Description + "</td><td>" + recepie.Type + "</td><td><button class='deleteButton' >delete</button><td><button class='updateButton' >update</button></tr>";
        //    }

        //    result += "</table>";

        //    return result;

        //}
    }
}