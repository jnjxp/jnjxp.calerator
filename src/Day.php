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
 * @category  Day
 * @package   Jnjxp\Calerator
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://jakejohns.net
 */

namespace Jnjxp\Calerator;

use IteratorAggregate;
use DatePeriod;
use DateInterval;

/**
 * Day
 *
 * @category Day
 * @package  Jnjxp\Calerator
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 *
 * @see Iterator
 */
class Day extends AbstractPeriod implements IteratorAggregate
{
    /**
     * IntervalSpec
     *
     * @var mixed
     *
     * @access protected
     */
    protected $intervalSpec = 'PT1H';

    /**
     * StringFormat
     *
     * @var mixed
     *
     * @access protected
     */
    protected $stringFormat = 'j';

    /**
     * GetIterator
     *
     * @return mixed
     *
     * @access public
     */
    public function getIterator()
    {
        $end = clone $this->startDate;
        $end->modify('+1 day');
        return new DatePeriod(
            $this->startDate,
            new DateInterval($this->intervalSpec),
            $end
        );
    }

    /**
     * __toString
     *
     * @return mixed
     *
     * @access public
     */
    public function __toString()
    {
        return $this->isInMonth()
            ? parent::__toString()
            : '';
    }

    /**
     * GetDateCopy
     *
     * @return DateTime
     *
     * @access public
     */
    public function getDateCopy()
    {
        return clone $this->startDate;
    }

    /**
     * Is day in month?
     *
     * @return bool
     *
     * @access public
     */
    public function isInMonth()
    {
        $month = $this->getParent()->getParent();
        return $this->startDate->format('n') == $month->format('n');
    }

    /**
     * GetDayOfMonth
     *
     * @return mixed
     * @throws exceptionclass [description]
     *
     * @access public
     */
    public function getDayOfMonth()
    {
        return $this->format('d');
    }

    /**
     * GetShortDayOfWeek
     *
     * @return mixed
     *
     * @access public
     */
    public function getShortDayOfWeek()
    {
        return $this->format('D');
    }

    /**
     * GetDayOfWeek
     *
     * @return mixed
     *
     * @access public
     */
    public function getDayOfWeek()
    {
        return $this->format('l');
    }

    /**
     * GetIsoDayOfWeek
     *
     * @return mixed
     *
     * @access public
     */
    public function getIsoDayOfWeek()
    {
        return $this->format('N');
    }

    /**
     * GetOrdinalDayOfMonth
     *
     * @return mixed
     *
     * @access public
     */
    public function getOrdinalDayOfMonth()
    {
        return $this->format('jS');
    }

    /**
     * GetNumericDayOfWeek
     *
     * @return mixed
     *
     * @access public
     */
    public function getNumericDayOfWeek()
    {
        return $this->format('w');
    }

}
