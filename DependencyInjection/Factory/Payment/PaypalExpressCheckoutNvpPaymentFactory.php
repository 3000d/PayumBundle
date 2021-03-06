<?php
namespace Payum\Bundle\PayumBundle\DependencyInjection\Factory\Payment;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class PaypalExpressCheckoutNvpPaymentFactory extends AbstractPaymentFactory
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'paypal_express_checkout_nvp';
    }

    /**
     * {@inheritDoc}
     */
    public function addConfiguration(ArrayNodeDefinition $builder)
    {
        parent::addConfiguration($builder);

        $builder->children()
            ->scalarNode('username')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('password')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('signature')->isRequired()->cannotBeEmpty()->end()
            ->booleanNode('sandbox')->defaultTrue()->end()
        ->end();
    }

    /**
     * {@inheritDoc}
     */
    protected function getPayumPaymentFactoryClass()
    {
        return 'Payum\Paypal\ExpressCheckout\Nvp\PaymentFactory';
    }

    /**
     * {@inheritDoc}
     */
    protected function getComposerPackage()
    {
        return 'payum/paypal-express-checkout-nvp';
    }
}