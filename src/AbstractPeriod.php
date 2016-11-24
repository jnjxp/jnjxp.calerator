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
abstract class AbstractPeriod
{
    /**
     * First day of the period
     *
     * @var DateTime
     *
     * @access protected
     */
    protected $startDate;

    /**
     * First day of current period
     *
     * @var DateTime
     *
     * @access protected
     */
    protected $date;

    /**
     * Increment Interval
     *
     * @var DateInterval
     *
     * @access protected
     */
    protected $interval;

    /**
     * ChildClass
     *
     * @var string
     *
     * @access protected
     */
    protected $childClass;

    /**
     * IntervalSpec
     *
     * @var mixed
     *
     * @access protected
     */
    protected $intervalSpec;

    /**
     * StringFormat
     *
     * @var mixed
     *
     * @access protected
     */
    protected $stringFormat;

    /**
     * KeyFormat
     *
     * @var mixed
     *
     * @access protected
     */
    protected $keyFormat;

    /**
     * Parent
     *
     * @var AbstractPeriod
     *
     * @access protected
     */
    protected $parent;

    /**
     * __construct
     *
     * @param AbstractPeriod $parent DESCRIPTION
     *
     * @access public
     */
    public function __construct(AbstractPeriod $parent)
    {
        $this->startDate = $parent->getDateCopy();
        $this->parent = $parent;
    }

    /**
     * GetParent
     *
     * @return AbstractPeriod
     *
     * @access public
     */
    public function getParent()
    {
        return $this->parent;
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
        return clone $this->date;
    }

    /**
     * Format
     *
     * @param mixed $format DESCRIPTION
     *
     * @return mixed
     * @throws exceptionclass [description]
     *
     * @access protected
     */
    protected function format($format)
    {
        return $this->startDate->format($format);
    }

    /**
     * __toString
     *
     * @return string
     *
     * @access public
     */
    public function __toString()
    {
        return $this->format($this->getStringFormat());
    }

    /**
     * GetStringFormat
     *
     * @return mixed
     *
     * @access protected
     */
    protected function getStringFormat()
    {
        return $this->stringFormat;
    }
}
