<?php
namespace Core\HTML;
class BootstrapForm extends Form{

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html){
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [], $attrs =[]){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        $attributs ='';
        if(!empty($attrs)){
            foreach($attrs as $key => $attr){
                $attributs .= $key.'="'.$attr.'"';
            }
        }
        if($type === 'textarea'){
            $input = '<textarea id="' . $name . '" name="' . $name . '" class="form-control"'.$attributs.'>' . $this->getValue($name) . '</textarea>';
        }elseif($type === 'file'){
            $input = '<input type="file" id="' . $name . '" name="'.$name.'"'.$attributs.'/>';
        }else{
            $input = '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control"'.$attributs.'>';
        }
         
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options){
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}