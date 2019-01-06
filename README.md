# my_php_frame_work

call any class you want like this className::fonction();

ex : Token::check(Input::get('token')) to check if token exist Token::generate() to generat a random token

ex : Input::get("$input_name") to get data from ur input filed

//database

ex : DB::getInstance() to connect to ur db

ex : DB::getInstance()->getTable($ur_table_name) to get table from db

ex : DB::getInstance()->get('$tableName', array('$where', '=', $something))->first() to get the first result 
delet first() if you want all results and so

//sessions
Session::get(Config::get('$session));
//

Config::get() -> to get any info u put on ur init file
/:/

Redirect::to($page) to get to redirect to somewhere 

well, anyway just have fun 
