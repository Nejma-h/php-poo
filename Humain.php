<?php
trait Bipède
{
    public function courir()
    {
        echo "Je cours !";
    }
}

interface Mammifère
{
    public function pilosite();
}
abstract class Humain implements Mammifère
{
    use Bipède;
    public $taille = 175;
    public $nom;
    public $force = 1;
    private $secret;
   public static $population = 0;

    function __construct($nomDeFamille)
    {
        $this->nom = $nomDeFamille;
        $this::$population ++;
        echo 'Je suis né.e'. "\n";
    }

    public function __destruct()
    {
        echo $this->nom. ' est mort.e'. "\n";
        $this::$population--;
    }
    public function marcher()
    {
        echo 'je marche ';
    }

    public function pilosite()
    {
        echo 'j\'ai du poil ';
    }

   public function maTaille()
    {
        echo $this->taille +1;
    }

    public function courir()
    {
        echo "Je cours !";
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret): void
    {
        $this->secret = $secret;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }
}


class Femme extends Humain implements Mammifère
{

    public function faireEnfant()
    {
        echo 'oui, je peux enfanter';
    }

    public function pilosite()
    {
        echo 'j\'ai moins de poil que homme ';
    }
}

$marcelline = new Femme('Bernard');
echo $marcelline->nom . "\n";
echo "Ma force : ". $marcelline->force . "\n";
echo "Marcelline mesure " . $marcelline->maTaille() . "\n";
echo $marcelline->faireEnfant() . "\n";
echo $marcelline->courir() . "\n";
echo $marcelline->pilosite() . "\n";
echo "Population : ". Humain::$population . "\n";

$constance = new Femme('Gogorian');
echo $constance->nom . "\n";
echo "Ma force : ". $constance->force . "\n";
echo "Constance mesure " .$constance->maTaille() . "\n";
echo $constance->pilosite() . "\n";
echo "Population : ". Humain::$population . "\n";

unset($constance);
echo "Population : ". Humain::$population . "\n";

class Homme extends Humain
{
    public $force = 2;
}

$adam = new Homme('Smith');
echo $adam->nom . "\n";
echo "Ma force : ". $adam->force . "\n";
echo "Adam mesure " .$adam->maTaille() . "\n";
echo $adam->pilosite() . "\n";
echo "Population : ". Humain::$population . "\n";
$adam->marcher(). "\n";

