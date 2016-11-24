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

/**
 * Month
 *
 * @category Month
 * @package  Jnjxp\Calerator
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 *
 * @see Iterator
 */
class Month extends AbstractPeriodIterator
{
    /**
     * Week of month
     *
     * @var int
     *
     * @access protected
     */
    protected $weekOfMonth = 1;

    /**
     * ChildClass
     *
     * @var string
     *
     * @access protected
     */
    protected $childClass = Week::class;

    /**
     * IntervalSpec
     *
     * @var mixed
     *
     * @access protected
     */
    protected $intervalSpec = 'P7D';

    /**
     * StringFormat
     *
     * @var mixed
     *
     * @access protected
     */
    protected $stringFormat = 'n';

    /**
     * Create
     *
     * @param mixed $year  DESCRIPTION
     * @param mixed $month DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     * @static
     */
    public static function create($year, $month)
    {
        $year = (new Year($year))->setMonth($month);
        return new self($year);
    }

    /**
     * SetWeek
     *
     * @param mixed $week DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function setWeek($week)
    {
        $this->rewind();
        while ($this->valid()) {
            if ($this->key() == $week) {
                return $this;
            }
            $this->next();
        }
        throw new \Exception("Invalid week number $week");
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
        return $this->weekOfMonth;
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
        parent::next();
        $this->weekOfMonth++;
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
        parent::rewind();
        $this->weekOfMonth = 1;

        if (0 != $this->date->format('w')) {
            $this->date->modify('Previous Sunday');
        }

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
        return $this->weekOfMonth == 1 || parent::valid();
    }

    /**
     * GetName
     *
     * @return string
     *
     * @access public
     */
    public function getName()
    {
        return $this->format('F');
    }

    /**
     * Get short name
     *
     * @return string
     *
     * @access public
     */
    public function getShortName()
    {
        return $this->format('M');
    }

    /**
     * Get total days
     *
     * @return int
     *
     * @access public
     */
    public function getTotalDays()
    {
        return $this->format('t');
    }
}
