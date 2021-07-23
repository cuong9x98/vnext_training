<?php
namespace AHT\Training\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(\AHT\Training\Model\StudentFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            [
                'name' => 'Manh',
                'gender' => 1,
                'dob' => '2000-6-7',
                'address' => 'hoang ha - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Hoanh',
                'gender' => 1,
                'dob' => '2000-6-19',
                'address' => 'hoang son - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Tien',
                'gender' => 1,
                'dob' => '19-9-2000',
                'address' => 'hoang son - hoang hoa - hai duong',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Huyền',
                'gender' => 1,
                'dob' => '2000-3-18',
                'address' => 'hoang son - hoang hoa - thai binh',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Tùng',
                'gender' => 1,
                'dob' => '1998-6-17',
                'address' => 'hoang Đại - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Hai',
                'gender' => 1,
                'dob' => '2000-6-19',
                'address' => 'hoang son - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Huế',
                'gender' => 0,
                'dob' => '2002-9-2',
                'address' => 'Thị trấn Phong Sơn - Cẩm Thủy - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Long',
                'gender' => 1,
                'dob' => '2000-1-19',
                'address' => 'hoang son - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Giang',
                'gender' => 1,
                'dob' => '2000-10-18',
                'address' => 'hoang son - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Toàn',
                'gender' => 1,
                'dob' => '1990-8-19',
                'address' => 'hoang son - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Hoàng',
                'gender' => 1,
                'dob' => '2000-6-9',
                'address' => 'hoang son - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Sinh',
                'gender' => 1,
                'dob' => '2000-8-19',
                'address' => 'hoang son - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
            [
                'name' => 'Liên',
                'gender' => 0,
                'dob' => '2000-8-29',
                'address' => 'hoang son - hoang hoa - thanh hoa',
                'slug'=>'',
                'email' =>'cuong9x98@gmail.com'
            ],
        ];

        foreach ($data as $item){
            $post = $this->_postFactory->create();
            $post->addData($item)->save();
        }
    }
}
?>
