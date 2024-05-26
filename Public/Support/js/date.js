const getListDate = (date_first, date_last, char_split = "/", result_split = "/") => {
  
  const year = { first: 0, last: 0 },
       month = { first: 0, last: 0 },
         day = { first: 0, last: 0 };
  
  let i = { start: 0, loop: 0, end: 0 },
     ii = { start: 0, loop: 0, end: 0 },
    iii = { start: 0, loop: 0, end: 0 };
  
  
  const date = {
    default: {
      year: {
        first: 2024,
        last: 2024
      },
      month: {
        first: 1,
        last: 12
      },
      day: {
        first: 1,
        last: 31
      }
    }
  };
  
  //**set rules
  
  let result = [];
  
  [year.first, month.first, day.first] 
    = date_first.split(char_split).map(m => parseInt(m));;
  
  [year.last, month.last, day.last] 
    = date_last.split(char_split).map(m => parseInt(m));
  
  if (
    year.first === undefined ||
    year.last === undefined ||
    month.first === undefined ||
    month.last === undefined ||
    day.first === undefined || 
    day.last === undefined
  ) {
    console.error("format parameter harus YYYY/MM/DD");
    return false;
  }
  
  //**set rules --date_last must be a next day
  if ( year.first <= year.last ) {
    if ( month.first <= month.last || year.first < year.last ) {
      if ( day.first <= day.last || month.first < month.last || year.first < year.last ) {
        
        i.start = year.first;
        i.end = year.last;
        
        for ( i.loop = i.start; i.loop <= i.end; i.loop++ ) {
          
          ii.start = (i.loop === year.first) ? month.first : date.default.month.first;
          ii.end = (i.loop === year.last) ? month.last : date.default.month.last;
          
          for ( ii.loop = ii.start; ii.loop <= ii.end; ii.loop++ ) {
            
            iii.start = ( ii.loop === month.first && i.loop === year.first ) ? day.first : date.default.day.first;
            iii.end = ( ii.loop === month.last && i.loop === year.last ) ? day.last : date.default.day.last;
            
            for ( iii.loop = iii.start; iii.loop <= iii.end; iii.loop++ ) {
              
              result.push(`${i.loop}${
                result_split
              }${
                (ii.loop < 10) 
                  ? "0" + ii.loop 
                  : ii.loop
              }${
                result_split
              }${
                (iii.loop < 10)
                  ? "0" + iii.loop
                  : iii.loop
              }`);
            }
          }
        }
      }
    }
  }
  
  return result;
};

module.exports = { getListDate };