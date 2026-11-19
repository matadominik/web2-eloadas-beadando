
import AppLogoIcon from '@/components/app-logo-icon';
import { home } from '@/routes';
import { Link } from '@inertiajs/react';
import { type PropsWithChildren } from 'react';

interface AuthLayoutProps {
    name?: string;
    title?: string;
    description?: string;
}

export default function AuthSimpleLayout({ children, title, description }: PropsWithChildren<AuthLayoutProps>) {
    return (
        <div className="relative flex min-h-svh overflow-hidden bg-slate-50">
            <div className="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(53,104,245,0.10),transparent_35%),radial-gradient(circle_at_bottom_right,rgba(99,102,241,0.10),transparent_35%)]" />

            <div className="relative z-10 mx-auto flex min-h-svh w-full max-w-7xl items-center justify-center px-4 py-8 sm:px-6 lg:px-8">
                <div className="grid w-full max-w-5xl overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-slate-900/5 lg:grid-cols-2">
                    <div className="hidden flex-col justify-between bg-gradient-to-br from-blue-700 via-blue-600 to-indigo-700 p-10 text-white lg:flex">
                        <Link href={home()} className="inline-flex items-center gap-3 text-white">
                            <div className="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15 ring-1 ring-white/20">
                                <AppLogoIcon className="size-8 fill-current text-white" />
                            </div>
                            <span className="text-2xl font-bold tracking-tight">E-Crayon</span>
                        </Link>

                        <div className="max-w-md">
                            <div className="mb-5 inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-blue-100">
                                Student information system
                            </div>
                            <h2 className="text-4xl font-bold leading-tight tracking-tight">
                                Your academic life, all in one place.
                            </h2>
                            <p className="mt-5 text-lg leading-8 text-blue-100">
                                Access your grades, follow your academic progress and stay connected with your educational information.
                            </p>

                            <div className="mt-9 grid grid-cols-2 gap-4">
                                <div className="rounded-2xl border border-white/15 bg-white/10 p-5 backdrop-blur">
                                    <div className="text-3xl font-bold">01</div>
                                    <div className="mt-2 text-sm font-medium text-blue-100">Grade overview</div>
                                </div>
                                <div className="rounded-2xl border border-white/15 bg-white/10 p-5 backdrop-blur">
                                    <div className="text-3xl font-bold">02</div>
                                    <div className="mt-2 text-sm font-medium text-blue-100">Progress tracking</div>
                                </div>
                            </div>
                        </div>

                        <p className="text-sm text-blue-100/80">
                            E-Crayon · Web Programming II project
                        </p>
                    </div>

                    <div className="flex items-center justify-center p-6 sm:p-10 lg:p-12">
                        <div className="w-full max-w-md">
                            <Link href={home()} className="mb-8 flex items-center justify-center gap-3 lg:hidden">
                                <div className="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-white shadow-lg shadow-blue-600/20">
                                    <AppLogoIcon className="size-7 fill-current text-white" />
                                </div>
                                <span className="text-xl font-bold tracking-tight text-slate-900">E-Crayon</span>
                            </Link>

                            <div className="mb-8">
                                <div className="mb-3 text-sm font-semibold uppercase tracking-wider text-blue-600">
                                    Welcome
                                </div>
                                <h1 className="text-3xl font-bold tracking-tight text-slate-900">
                                    {title}
                                </h1>
                                <p className="mt-3 text-sm leading-6 text-slate-500">
                                    {description}
                                </p>
                            </div>

                            {children}

                            <div className="mt-8 border-t border-slate-100 pt-5 text-center text-xs text-slate-400">
                                Secure access to your E-Crayon account
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
