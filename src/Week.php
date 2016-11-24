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
 * @category  Week
 * @package   Jnjxp\Calerator
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://jakejohns.net
 */

namespace Jnjxp\Calerator;

/**
 * Week
 *
 * @category Week
 * @package  Jnjxp\Calerator
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 *
 * @see Iterator
 */
class Week extends AbstractPeriodIterator
{
    /**
     * ChildClass
     *
     * @var string
     *
     * @access protected
     */
    protected $childClass = Day::class;

    /**
     * IntervalSpec
     *
     * @var mixed
     *
     * @access protected
     */
    protected $intervalSpec = 'P1D';

    /**
     * StringFormat
     *
     * @var mixed
     *
     * @access protected
     */
    protected $stringFormat = 'W';

    /**
     * KeyFormat
     *
     * @var string
     *
     * @access protected
     */
    protected $keyFormat = 'w';

    /**
     * Create
     *
     * @param mixed $year  DESCRIPTION
     * @param mixed $month DESCRIPTION
     * @param mixed $week  DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     * @static
     */
    public static function create($year, $month, $week)
    {
        $month = Month::create($year, $month)->setWeek($week);
        return new self($month);
    }

    /**
     * Is date in this week?
     *
     * @return bool
     *
     * @access public
     */
    public function valid()
    {
        return $this->date == $this->startDate
            || $this->date->format('w') > 0;
    }
}
