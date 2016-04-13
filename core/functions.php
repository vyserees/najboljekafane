<?php
/**
 * Created by PhpStorm.
 * User: vlada
 * Date: 13.4.16.
 * Time: 08.29
 */

/*
 * including header and footer on pages
 * #params 
 * #return - void
 */
function get_header(){
    require_once MVC_PATH.'/inc/header.php';
}
function get_footer(){
    require_once MVC_PATH.'/inc/footer.php';
}

/*
 * ----DATABASE MANIPULATIONS-----
 */

/*
 * selections. 
 * #params:
 *      $table - selection table(string)
 *      $where - where clause(array of pairs:<column name> => <value>) - can be skipped(null)
 *      $order - order by columns(array of column names, first member of array is first order choice) - can be skipped(null)
 *      $ascdesc - ordering type(string, 'ASC' for ascending, 'DESC' for descending) - can be skipped(null)
 *      $limit - limit function(integer, number) - can be skipped(null)
 *
 * #return: array of rows. If one row is returned, when calling function use [0] index to display row!
 */
function selection($table,$where=null,$order=null,$ascdesc=null,$limit=null){
    $q = new Query();
    $q->table = $table;
    if(null!==$where){
        $q->where = $where;
    }
    if(null!==$order){
        $q->order = $order;
    }
    if(null!==$ascdesc){
        $q->ascdesc = $ascdesc;
    }
    if(null!==$limit){
        $q->limit = $limit;
    }
    $res = $q->read();

    return $res;
}

/*
 * updating.
 * #params:
 *      $table - table to update
 *      $where - where clause(array of pairs, <column_name> => <value>)
 *      $vals - values to update(array of pairs, <column_name> => <value>; must include columns and values from $where array!!!)
 *
 * #return - void
 */
function updating($table,$where,$vals){
    $q = new Query();
    $q->table = $table;
    $q->where = $where;
    $q->updatearray = $vals;
    $q->change();
}

/*
 * inserting.
 * #params:
 *      $table - table for insertion
 *      $insert - values to insert(array of pairs, <column_name> => <value>)
 *
 * #return - integer, id of last inserted row
 */
function inserting($table,$insert){
    $q = new Query();
    $q->table = $table;
    $q->insertarray = $insert;
    $q->insert();

    return $q->lastInsertId();
}

/*
 * deleting
 * #params:
 *      $table - table for deletion of row(s)
 *      $where - where clause(array of pairs, <column_name> => <value>
 * #return - void
 */
function deleting($table,$where){
    $q = new Query();
    $q->table = $table;
    $q->where = $where;
    $q->delete();
}
/*
 * customized queries. (for joining tables,or some specific conditions that were not handled with common functions
 * #params:
 *      $str = query string
 *
 * #return: array of rows
 */
function q_custom($str){
    $q = new Query();
    $ex = $q->prepare($str);
    $ex->execute();
    $res = $ex->fetchAll();
    return $res;
}

/*
 * -----MAILING SYSTEM-----
 * sending mail
 * #params:
 *      $to - email of receiver(string)
 *      $from - email of sender(string)
 *      $sub - subject(string)
 *      $mes - message(string)
 *      $att - attachment(s)[optional] (array of files to attach)
 * 
 * #return - void
 */
function mailing($to,$from,$sub,$mes,$att=null){
    $e = new Email();
    $e->to_email = $to;
    $e->from_email = $from;
    $e->subject_str = $sub;
    $e->message_str = $mes;
    
    if(null!==$att){

    }
    $e->sendmail();
}

/*
 * authentication
 * #params:
 *      $user - string, user's email or username(depends on users table column)
 *      $password - string, user's password
 *      $success - string, url to redirect when authentication is confirmed
 *      $fail - string, url to redirect when authentication fails
 *
 * #return: redirection to specified url, if authenticated - goes to $success url,
 *          else - goes to $fail url. Also, populate session data with user id and role
 *          $_SESSION['USER_ID'] and $_SESSION['USER_ROLE']
 */
function authenticate($user,$password,$success,$fail){
    $a = new Auth();
    $a->user = $user;
    $a->password = $password;
    $a->success_url = $success;
    $a->fail_url = $fail;

    $a->redirect();
}