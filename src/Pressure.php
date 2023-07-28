<?php

namespace Unitz;

class Pressure extends AbstractUnit
{
    private float $bar;
    private float $psi;

    public function __construct(?float $bar = null, ?float $psi = null, array $preferences = [])
    {
        if (!$this->hasOnlyOneValue([$bar, $psi])) {
            throw new \InvalidArgumentException('Only one Pressure type can be set at a time.');
        }

        parent::__construct($preferences);

        if ($bar) {
            $this->setBar($bar);
        }

        if ($psi) {
            $this->setPsi($psi);
        }
    }

    /**
     * @param float $bar
     * @return $this
     */
    public function setBar(float $bar): self
    {
        $this->bar = $bar;
        $this->psi = self::convertBarToPsi($bar);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getBar(?int $round = null): float
    {
        return $round ? round($this->bar, $round) : $this->bar;
    }

    /**
     * @param float $psi
     * @return $this
     */
    public function setPsi(float $psi): self
    {
        $this->bar = self::convertPsiToBar($psi);
        $this->psi = $psi;

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getPsi(?int $round = null): float
    {
        return $round ? round($this->psi, $round) : $this->psi;
    }

    /**
     * Source:
     * https://www.asknumbers.com/psi-to-bar.aspx
     *
     * @param float $psi
     * @return float
     */
    public static function convertPsiToBar(float $psi): float
    {
        return $psi / 14.5037738;
    }

    /**
     * Source:
     * https://www.asknumbers.com/psi-to-bar.aspx
     *
     * @param float $bar
     * @return float
     */
    public static function convertBarToPsi(float $bar): float
    {
        return $bar * 14.5037738;
    }
}