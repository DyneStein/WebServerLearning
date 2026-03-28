
<?php

$name = "DyenAsif";
$age = 19;


echo gettype($name);
echo var_dump($age);


echo substr($name, 1,4);


if ($age > 18)
    {

    echo "You are 18 plus";

    }
    else
        {

    echo "You are under 18";
        }




for ($i = 1; $i<=5;$i++)
    {
    echo $i . "<br>";

    }


#normal indexed arrays
$interests = ["books", "games", "cards"];

echo $interests[0];
echo count($interests); //type len in python


$subjects = [];
array_push($subjects, "math");






#associative arrays
$dict = ["A" => 45,
"B"=> "lol"
];


echo $dict["A"];






function greet($name)
{
    echo "Hellow,  " . $name;

}



greet("Dyen");


?>
