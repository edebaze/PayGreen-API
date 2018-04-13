using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace APayI.Models
{
    public class TodoItem
    {
        public long     Id              { get; set; }
        public float    amount          { get; set; }
        public string   currency        { get; set; }
        public string   status          { get; set; }
        public DateTime createdAT       { get; set; }
    }
}
