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
 * @category  Month
 * @package   Jnjxp\Calerator
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://jakejohns.net
 */

namespace Jnjxp\Calerator;

use DateTime;
use DateInterval;
use Iterator;

/**
 * AbstractPeriod
 *
 * @category AbstractPeriod
 * @package  Jnjxp\Calerator
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 *
 * @see Iterator
 */
abstract class AbstractPeriodIterator extends AbstractPeriod implements Iterator
{
    /**
     * ChildClass
     *
     * @var string
     *
     * @access protected
     */
    protected $childClass;

    /**
     * KeyFormat
     *
     * @var mixed
     *
     * @access protected
     */
    protected $keyFormat;

    /**
     * IntervalSpec
     *
     * @var mixed
     *
     * @access protected
     */
    protected $intervalSpec;

    /**
     * Increment Interval
     *
     * @var DateInterval
     *
     * @access protected
     */
    protected $interval;

    /**
     * Return current week
     *
     * @return Week
     *
     * @access public
     */
    public function current()
    {
        return new $this->childClass($this);
    }

    /**
     * Return week of the month
     *
     * @return mixed
     *
     * @access public
     */
    public function key()
    {
        return $this->date->format($this->getKeyFormat());
    }

    /**
     * GetKeyFormat
     *
     * @return mixed
     *
     * @access protected
     */
    protected function getKeyFormat()
    {
        return $this->keyFormat;
    }

    /**
     * Advance week count and date
     *
     * @return void
     *
     * @access public
     */
    public function next()
    {
        $this->date->add($this->getInterval());
    }

    /**
     * GetInterval
     *
     * @return DateInterval
     *
     * @access protected
     */
    protected function getInterval()
    {
        if (! $this->interval) {
            $this->interval = new DateInterval($this->getIntervalSpec());
        }
        return $this->interval;
    }

    /**
     * GetIntervalSpec
     *
     * @return string
     *
     * @access protected
     */
    protected function getIntervalSpec()
    {
        return $this->intervalSpec;
    }

    /**
     * Reset week count and date
     *
     * @return void
     *
     * @access public
     */
    public function rewind()
    {
        $this->date = clone $this->startDate;
    }

    /**
     * Is current date in month or the first week?
     *
     * @return mixed
     *
     * @access public
     */
    public function valid()
    {
        $format = $this->getStringFormat();
        return $this->date->format($format) == $this->startDate->format($format);
    }

}
