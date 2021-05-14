<?php
namespace App\Components;

class recommend{

    public function similarity_distance($matrix, $person1, $person2){
        $similar = array();
        $sum = 0;
        // dd($matrix[$person1],$person1, $person2);

        if(isset($matrix[$person1])){
            foreach($matrix[$person1] as $key => $value){
                if(array_key_exists($key, $matrix[$person2])){
                    $similar[$key] = 1;
                    // dd($similar); 
                }
            }
        } 
        else{
            foreach($matrix[$person2] as $key => $value){
                if(array_key_exists($key, $matrix[$person2])){
                    $similar[$key] = 1;
                    // dd($similar);   
                }
            }
        }
    

   

        
        if($similar == 0){
            echo '$similar == 0';
            return 0;
        }

        if(isset($matrix[$person1])){
            foreach($matrix[$person1] as $key => $value){
                if(array_key_exists($key, $matrix[$person2])){
                    $sum = $sum + pow($value - $matrix[$person2][$key], 2); //ham pow tra ve gia tri m mu n vd: pow(m,n) -> m^n
                    // dd($sum);
                }
            }
        } 
        else{
            foreach($matrix[$person2] as $key => $value){
                // dd($matrix, $key, $matrix[$person2]);    
                if(array_key_exists($key, $matrix[$person2])){
                    $sum = $sum + pow($value - $matrix[$person2][$key], 2);
                }
            }
        }
  
     


        return 1/(1 + sqrt($sum));
    }


    public function getRecommendation($matrix, $person){
        
        $total = array();
        $simsums = array();
        $ranks = array();

        foreach($matrix as $otherPerson => $value){
            if($otherPerson != $person){
                $sim = $this->similarity_distance($matrix, $person, $otherPerson);
                foreach($matrix[$otherPerson] as $key => $value){
                    if(isset($matrix[$person])){
                        if(!array_key_exists($key, $matrix[$person])){
                             //tử số
                            if(!array_key_exists($key, $total)){
                                $total[$key] = 0; 
                            }
                            $total[$key] += $matrix[$otherPerson][$key] * $sim;
    
                            // mẫu số
                            if(!array_key_exists($key, $simsums)){
                                // dd($simsums, $key);
                                $simsums[$key] = 0;
                                // dd($simsums[$key]);
                            }

                            $simsums[$key] += $sim;
                        }
                    } 
                    else{
                            //tử số
                        if(!array_key_exists($key, $total)){
                            $total[$key] = 0; 
                        }
                        $total[$key] += $matrix[$otherPerson][$key] * $sim;

                        // mẫu số
                        if(!array_key_exists($key, $simsums)){ 

                            $simsums[$key] = 0;
                        }
                        $simsums[$key] += $sim;
                    }
  
                }
                // var_dump($sim);
            }
        }

        //lấy tử số chia mẫu số
        foreach($total as $key => $value){
            $ranks[$key] = $value/$simsums[$key];

        }
        $sort_arr = $ranks;

        array_multisort($sort_arr, SORT_DESC);
        return $ranks;
    }


}