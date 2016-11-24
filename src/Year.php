<?php
/**
 * Calerator
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Year
 * @package   Jnjxp\Calerator
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://jakejohns.net
 */

namespace Jnjxp\Calerator;

use DateTime;
use DateInterval;

/**
 * Year
 *
 * @category Year
 * @package  Jnjxp\Calerator
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 *
 * @see AbstractPeriod
 */
class Year extends AbstractPeriodIterator
{

    /**
     * ChildClass
     *
     * @var string
     *
     * @access protected
     */
    protected $childClass = Month::class;

    /**
     * StringFormat
     *
     * @var mixed
     *
     * @access protected
     */
    protected $stringFormat = 'Y';

    /**
     * KeyFormat
     *
     * @var mixed
     *
     * @access protected
     */
    protected $keyFormat = 'n';

    /**
     * __construct
     *
     * @param mixed $year DESCRIPTION
     *
     * @access public
     */
    public function __construct($year)
    {
        $this->startDate = (new DateTime)
            ->setDate($year, 1, 1)
            ->setTime(0, 0, 0);
    }

    /**
     * SetMonth
     *
     * @param mixed $month DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function setMonth($month)
    {
        $this->rewind();
        $this->date->setDate(
            $this->date->format('Y'),
            $month,
            1
        );
        return $this;
    }

    /**
     * Interval
     *
     * @return DateInterval
     *
     * @access protected
     */
    protected function getInterval()
    {
        return new DateInterval(
            'P' . $this->date->format('t') . 'D'
        );
    }
}
