<?php

namespace Unitz;

class Color extends AbstractUnit
{
    private float $srm;
    private float $ebc;
    private float $lovibond;

    public function __construct(
        ?float $srm = null,
        ?float $ebc = null,
        ?float $lovibond = null,
        array $preferences = []
    ) {
        parent::__construct($preferences);

        if ($srm) {
            $this->setSrm($srm);
        }

        if ($ebc) {
            $this->setEbc($ebc);
        }

        if ($lovibond) {
            $this->setLovibond($lovibond);
        }
    }

    /**
     * @param float $srm
     * @return $this
     */
    public function setSrm(float $srm): self
    {
        $this->srm = $srm;
        $this->ebc = self::convertSrmToEbc($srm);
        $this->lovibond = self::convertSrmToLovibond($srm);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getSrm(?int $round = null): float
    {
        return $round ? round($this->srm, $round) : $this->srm;
    }

    /**
     * @param float $ebc
     * @return $this
     */
    public function setEbc(float $ebc): self
    {
        $this->ebc = $ebc;
        $this->srm = self::convertEbcToSrm($ebc);
        $this->lovibond = self::convertSrmToLovibond($this->srm);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getEbc(?int $round = null): float
    {
        return $round ? round($this->ebc, $round) : $this->ebc;
    }

    /**
     * @param float $lovibond
     * @return $this
     */
    public function setLovibond(float $lovibond): self
    {
        $this->lovibond = $lovibond;
        $this->srm = self::convertLovibondToSrm($lovibond);
        $this->ebc = self::convertSrmToEbc($this->srm);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getLovibond(?int $round = null): float
    {
        return $round ? round($this->lovibond, $round) : $this->lovibond;
    }

    /**
     * @param float $srm
     * @return float
     */
    public static function convertSrmToEbc(float $srm): float
    {
        return $srm * 1.97;
    }

    /**
     * @param float $ebc
     * @return float
     */
    public static function convertEbcToSrm(float $ebc): float
    {
        return $ebc / 1.97;
    }

    /**
     * @param float $srm
     * @return float
     */
    public static function convertSrmToLovibond(float $srm): float
    {
        return ($srm + 0.76) / 1.3546;
    }

    /**
     * @param float $lovibond
     * @return float
     */
    public static function convertLovibondToSrm(float $lovibond): float
    {
        return 1.3546 * $lovibond - 0.76;
    }
}