using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;

namespace WebApplicationLabSix.Models
{
    public class MusicDbContext: DbContext
    {
        public MusicDbContext() : base("DefaultConnection") { }
        public DbSet<Song> Songs { get; set; }

        public System.Data.Entity.DbSet<WebApplicationLabSix.Models.Genre> Genres { get; set; }
    }
}