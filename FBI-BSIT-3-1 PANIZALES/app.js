const greet = require('./myFunctions');
const get_name = require('./name');


greet(get_name.name1);
greet(get_name.name2);
greet(get_name.name3);