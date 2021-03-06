<?php
/**
 * mutu-v2
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 */
/**
 * Interface IK9ProgressHelper
 * @package app\helpers\kriteria9
 */

namespace app\helpers\kriteria9;


interface IK9ProgressHelper
{

    public static function getDokumenLedProgress($led, $dokumens, $kriteria);
    public static function getDokumenLkProgress($lk,$dokumen, $kriteria);
}
