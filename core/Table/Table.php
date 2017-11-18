<?php
namespace Core\Table;

use Core\Database\Database;

class Table
{

    protected $table;
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    public function all(){
        return $this->query('SELECT * FROM ' . $this->table);
    }

    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function update($id, $field, $fields, $table){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE $table SET $sql_part WHERE $field = ?", $attributes, true);
    }

    public function delete($id,$champs,$table){
        return $this->query("DELETE FROM $table WHERE $champs = ?", [$id], true);
    }

    public function create($fields,$table){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k";
            $attributes[] = "'$v'";
        }
		
        $attributes = implode(', ', $attributes);
        $sql_parts = implode(', ', $sql_parts);

		//echo "INSERT INTO $table ($sql_parts) VALUES($attributes)";
		
        return $this->query("INSERT INTO $table ($sql_parts) VALUES ($attributes)");
    }

    public function extract($key, $value){
        $records = $this->all();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function query($statement, $attributes = null, $one = false){
        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }

}