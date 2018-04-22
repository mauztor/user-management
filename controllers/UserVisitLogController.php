<?php

namespace mauztor\modules\UserManagement\controllers;

use mauztor\modules\UserManagement\models\search\UserVisitLogSearch;
use mauztor\modules\UserManagement\models\UserVisitLog;

/**
 * UserVisitLogController implements the CRUD actions for UserVisitLog model.
 */
class UserVisitLogController extends AdminDefaultController
{
	/**
	 * @var UserVisitLog
	 */
	public $modelClass = 'mauztor\modules\UserManagement\models\UserVisitLog';

	/**
	 * @var UserVisitLogSearch
	 */
	public $modelSearchClass = 'mauztor\modules\UserManagement\models\search\UserVisitLogSearch';

	public $enableOnlyActions = ['index', 'view', 'grid-page-size'];
}
