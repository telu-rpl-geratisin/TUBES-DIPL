<?php 

namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $app_auth_type = $request->uri->getSegment(1);

        switch ($app_auth_type) {
            case 'admin':
                if(!session('auth_admin'))
                {
                    return redirect('admin.login.index');
                }
                break;
            case 'pub':
                if(!session('auth_pub'))
                {
                    return redirect('public.login.index');
                }
                break;
            case 'company':
                if(!session('auth_company'))
                {
                    return redirect('company.login.index');
                }
                break;
            
            default:
                return redirect('public.login.index');
                break;
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}