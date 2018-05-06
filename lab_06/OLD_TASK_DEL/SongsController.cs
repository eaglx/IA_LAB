using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

using WebApplicationLabSix.Models;

namespace WebApplicationLabSix.Controllers
{
    public class SongsController : Controller
    {
        // GET: Songs
        public ActionResult Index()
        {
            //return Content("Hello World!");
            Song song = new Song();
            song.Name = "a";
            song.Artist = "b";
            song.Genre = "c";
            song.Id = 1;
            return View(song);
        }

        public ActionResult Square(int id)
        {
            return Content((id * id).ToString());
        }

        public ActionResult Square23()
        {
            return Square(23);
        }
    }
}