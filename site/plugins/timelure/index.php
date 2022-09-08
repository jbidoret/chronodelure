<?php

function categoryDisplay($str){   
  switch ($str) {
    case 'typographie':
      return "Contexte (typo)graphique";
      break;
    case 'technique':
      return "Contexte technique";
      break;
    default:
      return "Contexte";
      break;
  }         
}

Kirby::plugin('timelure/helpers', [
    
    'pageMethods' => [
        'getTemplateName' => function(){
            $str =  $this->blueprint()->title();
            return $str;            
        }
    ],
    'fieldMethods' => [
        
        'niceURL' => function($field){
          $url = $field->value();
          if (V::url($url)) {
            $niceURL = str_replace('http://', '', $url);
            $niceURL = str_replace('https://', '', $niceURL);
            $niceURL = str_replace('www.', '', $niceURL);
            $niceURL = trim($niceURL, '/');
          } 
          return $field;          
        }
    ],
    
    
]);