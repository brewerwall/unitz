<?php

namespace Unitz;

class Volume extends AbstractUnit
{
    private float $ounce;
    private float $gallon;
    private float $barrel;
    private float $milliliter;
    private float $liter;
    private float $hectoliter;

    public function __construct(
        float $ounce = null,
        float $gallon = null,
        float $barrel = null,
        float $milliliter = null,
        float $liter = null,
        float $hectoliter = null,
        array $preferences = []
    ) {
        if (!$this->hasOnlyOneValue([$ounce, $gallon, $barrel, $milliliter, $liter, $hectoliter])) {
            throw new \InvalidArgumentException('Only one Volume type can be set at a time.');
        }

        parent::__construct($preferences);

        if ($ounce) {
            $this->setOunce($ounce);
        }

        if ($gallon) {
            $this->setGallon($gallon);
        }

        if ($barrel) {
            $this->setBarrel($barrel);
        }

        if ($milliliter) {
            $this->setMilliliter($milliliter);
        }

        if ($liter) {
            $this->setLiter($liter);
        }

        if ($hectoliter) {
            $this->setHectoliter($hectoliter);
        }
    }

    /**
     * @param float $ounce
     * @return $this
     */
    public function setOunce(float $ounce): self
    {
        $this->ounce = $ounce;
        $this->gallon = self::convertOunceToGallon($ounce);
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->liter = self::convertGallonToLiter($this->gallon);
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getOunce(?int $round = null): float
    {
        return $round ? round($this->ounce, $round) : $this->ounce;
    }

    /**
     * @param float $gallon
     * @return $this
     */
    public function setGallon(float $gallon): self
    {
        $this->ounce = self::convertGallonToOunce($gallon);
        $this->gallon = $gallon;
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->liter = self::convertGallonToLiter($this->gallon);
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getGallon(?int $round = null): float
    {
        return $round ? round($this->gallon, $round) : $this->gallon;
    }

    /**
     * @param float $barrel
     * @return $this
     */
    public function setBarrel(float $barrel): self
    {
        $this->barrel = $barrel;
        $this->gallon = self::convertBarrelToGallon($barrel);
        $this->ounce = self::convertGallonToOunce($this->gallon);
        $this->liter = self::convertGallonToLiter($this->gallon);
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getBarrel(?int $round = null): float
    {
        return $round ? round($this->barrel, $round) : $this->barrel;
    }

    /**
     * @param float $milliliter
     * @return $this
     */
    public function setMilliliter(float $milliliter): self
    {
        $this->milliliter = $milliliter;
        $this->liter = self::convertMilliliterToLiter($milliliter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);
        $this->gallon = self::convertLiterToGallon($this->liter);
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->ounce = self::convertGallonToOunce($this->gallon);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getMilliliter(?int $round = null): float
    {
        return $round ? round($this->milliliter, $round) : $this->milliliter;
    }

    /**
     * @param float $liter
     * @return $this
     */
    public function setLiter(float $liter): self
    {
        $this->liter = $liter;
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);
        $this->gallon = self::convertLiterToGallon($this->liter);
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->ounce = self::convertGallonToOunce($this->gallon);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getLiter(?int $round = null): float
    {
        return $round ? round($this->liter, $round) : $this->liter;
    }

    /**
     * @param float $hectoliter
     * @return $this
     */
    public function setHectoliter(float $hectoliter): self
    {
        $this->hectoliter = $hectoliter;
        $this->liter = self::convertHectoliterToLiter($hectoliter);
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->gallon = self::convertLiterToGallon($this->liter);
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->ounce = self::convertGallonToOunce($this->gallon);

        return $this;
    }

    /**
     * @param ?int $round
     * @return float
     */
    public function getHectoliter(?int $round = null): float
    {
        return $round ? round($this->hectoliter, $round) : $this->hectoliter;
    }

    /**
     * @param float $ounce
     * @return float
     */
    public static function convertOunceToGallon(float $ounce): float
    {
        return $ounce / 128;
    }

    /**
     * @param float $gallon
     * @return float
     */
    public static function convertGallonToOunce(float $gallon): float
    {
        return $gallon * 128;
    }

    /**
     * @param float $gallon
     * @return float
     */
    public static function convertGallonToBarrel(float $gallon): float
    {
        return $gallon / 31;
    }

    /**
     * @param float $barrel
     * @return float
     */
    public static function convertBarrelToGallon(float $barrel): float
    {
        return $barrel * 31;
    }

    /**
     * @param float $gallon
     * @return float
     */
    public static function convertGallonToLiter(float $gallon): float
    {
        return $gallon * 3.785411784;
    }

    /**
     * @param float $liter
     * @return float
     */
    public static function convertLiterToGallon(float $liter): float
    {
        return $liter / 3.785411784;
    }

    /**
     * @param float $liter
     * @return float
     */
    public static function convertLiterToMilliliter(float $liter): float
    {
        return $liter * 1000;
    }

    /**
     * @param float $milliliter
     * @return float
     */
    public static function convertMilliliterToLiter(float $milliliter): float
    {
        return $milliliter / 1000;
    }

    /**
     * @param float $liter
     * @return float
     */
    public static function convertLiterToHectoliter(float $liter): float
    {
        return $liter / 100;
    }

    /**
     * @param float $hectoliter
     * @return float
     */
    public static function convertHectoliterToLiter(float $hectoliter): float
    {
        return $hectoliter * 100;
    }

}