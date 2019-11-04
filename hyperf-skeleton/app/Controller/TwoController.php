<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Service\UserServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;


/**
 * Class TwoController
 * @package App\Controller
 * @AutoController()
 */
class TwoController extends Controller
{
    /**
     * @Inject
     * @var UserServiceInterface
     */
    private $userService;

    public function index()
    {
        $id = 1;
        // 直接使用
        return $this->userService->getInfoById($id);
    }

    public function two(){
        $this->request->input('hello','he');
    }

}
