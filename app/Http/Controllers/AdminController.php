<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use App\Actions\Fortify\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\LoginResponse;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AdminController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */



    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function loginForm()
    {
        return view('auth.login', ['guard' => 'admin']);
    }


    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }

    // chart ..pie chart
    public function pieChart()
    {
        $categorywiseproduct = Category::withCount('products')->get();
        //dd($categorywiseproduct);
        return response($categorywiseproduct);
    }

    // chart ..donut chart
    public function DoughnutChartOne()
    {
        $totalSellingProduct = OrderItem::sum('qty');
        $totalCurrentStock = Product::sum('product_qty');

        $doughnutChart = [$totalSellingProduct, $totalCurrentStock];
        return response($doughnutChart);
    }

    // chart ... bar chart
    public function barChart()
    {
        $totalSale = Order::whereYear("created_at", date("Y"))
            ->select(
                DB::raw("(count(status)) as total "),
                DB::raw("(DATE_FORMAT(created_at, '%m')) as my_date ")
            )
            ->orderBy(
                "my_date",
                "ASC"
            )
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
            ->pluck('total', 'my_date');

            // dd($totalSale);
        return response($totalSale);
    }

    public function lineChart()
    {
        $totalSale = User::whereYear("created_at", date("Y"))
            ->select(
                DB::raw("(count(id)) as total "),
                DB::raw("(DATE_FORMAT(created_at, '%m')) as my_date ")
            )
            ->orderBy(
                "my_date",
                "ASC"
            )
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
            ->pluck('total', 'my_date');

        return response($totalSale);
    }
}//main
