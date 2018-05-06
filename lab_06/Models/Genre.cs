using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace WebApplicationLabSix.Models
{
    public class Genre
    {
        public int Id { get; set; }
        public string Name { get; set; }
        [Required(ErrorMessage = "Name is required!")]
        [StringLength(100, ErrorMessage = "Maximal length of the name of a song is 100 characters!")]
        public ICollection<Song> Songs { get; set; }
    }
}