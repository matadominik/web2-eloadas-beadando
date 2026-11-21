import AuthenticatedSessionController from '@/actions/App/Http/Controllers/Auth/AuthenticatedSessionController';
import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { register } from '@/routes';
import { request } from '@/routes/password';
import { Form, Head } from '@inertiajs/react';
import { LoaderCircle, LockKeyhole, Mail, GraduationCap, ArrowRight } from 'lucide-react';

interface LoginProps {
    status?: string;
    canResetPassword: boolean;
}

export default function Login({ status, canResetPassword }: LoginProps) {
    return (
        <>
            <Head title="Log in" />

            <div className="relative min-h-screen overflow-hidden bg-[#07090f] text-white flex items-center justify-center p-5">
                <div className="pointer-events-none absolute inset-0">
                    <div className="absolute -left-40 -top-40 h-[500px] w-[500px] rounded-full bg-blue-600/10 blur-[130px]" />
                    <div className="absolute -bottom-40 -right-40 h-[500px] w-[500px] rounded-full bg-violet-600/10 blur-[130px]" />

                    <div
                        className="absolute inset-0 opacity-[0.04]"
                        style={{
                            backgroundImage:
                                'linear-gradient(rgba(255,255,255,0.15) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.15) 1px, transparent 1px)',
                            backgroundSize: '45px 45px',
                        }}
                    />
                </div>

                <div className="relative w-full max-w-[1000px] overflow-hidden rounded-3xl border border-white/[0.08] bg-[#0d111a]/95 shadow-[0_30px_100px_rgba(0,0,0,0.6)] backdrop-blur-xl lg:grid lg:grid-cols-2">
                    <div className="relative hidden flex-col justify-between overflow-hidden border-r border-white/[0.06] bg-[#0b101b] p-12 lg:flex">
                        <div className="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-blue-600/15 blur-[100px]" />
                        <div className="absolute -bottom-32 -left-32 h-80 w-80 rounded-full bg-violet-600/15 blur-[100px]" />

                        <div className="relative z-10">
                            <div className="flex items-center gap-3">
                                <div className="flex h-12 w-12 items-center justify-center rounded-2xl border border-blue-400/20 bg-gradient-to-br from-blue-500 to-violet-600 shadow-lg shadow-blue-500/20">
                                    <GraduationCap className="h-7 w-7 text-white" />
                                </div>

                                <div>
                                    <h1 className="text-xl font-bold tracking-tight">
                                        E-Crayon
                                    </h1>
                                    <p className="text-xs text-slate-500">
                                        Student information system
                                    </p>
                                </div>
                            </div>

                            <div className="mt-24 inline-flex items-center gap-2 rounded-full border border-blue-500/20 bg-blue-500/10 px-4 py-2">
                                <span className="h-2 w-2 rounded-full bg-blue-400 shadow-[0_0_10px_rgba(96,165,250,0.8)]" />
                                <span className="text-xs font-medium text-blue-300">
                                    Academic platform
                                </span>
                            </div>

                            <h2 className="mt-7 text-4xl font-bold leading-tight tracking-tight">
                                Your academic life,
                                <br />
                                <span className="bg-gradient-to-r from-blue-400 to-violet-400 bg-clip-text text-transparent">
                                    all in one place.
                                </span>
                            </h2>

                            <p className="mt-6 max-w-md text-[15px] leading-7 text-slate-400">
                                Access your grades, track your academic progress
                                and stay connected with your educational information
                                through one modern platform.
                            </p>

                            <div className="mt-10 grid grid-cols-2 gap-4">
                                <div className="rounded-2xl border border-white/[0.06] bg-white/[0.03] p-5 transition hover:border-blue-500/30 hover:bg-white/[0.05]">
                                    <div className="text-3xl font-bold text-white">
                                        01
                                    </div>
                                    <div className="mt-3 text-sm font-medium text-slate-300">
                                        Grade overview
                                    </div>
                                    <div className="mt-1 text-xs text-slate-500">
                                        Your academic results
                                    </div>
                                </div>

                                <div className="rounded-2xl border border-white/[0.06] bg-white/[0.03] p-5 transition hover:border-violet-500/30 hover:bg-white/[0.05]">
                                    <div className="text-3xl font-bold text-white">
                                        02
                                    </div>
                                    <div className="mt-3 text-sm font-medium text-slate-300">
                                        Progress tracking
                                    </div>
                                    <div className="mt-1 text-xs text-slate-500">
                                        Follow your progress
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="relative z-10 mt-12 flex items-center justify-between border-t border-white/[0.06] pt-6">
                            <p className="text-xs text-slate-500">
                                E-Crayon · Web Programming II
                            </p>

                            <div className="flex gap-1.5">
                                <div className="h-1.5 w-6 rounded-full bg-blue-500" />
                                <div className="h-1.5 w-2 rounded-full bg-violet-500" />
                                <div className="h-1.5 w-2 rounded-full bg-slate-700" />
                            </div>
                        </div>
                    </div>

                    <div className="relative flex flex-col justify-center p-8 sm:p-12 lg:p-14">
                        <div className="mb-10 flex items-center gap-3 lg:hidden">
                            <div className="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-violet-600">
                                <GraduationCap className="h-6 w-6" />
                            </div>

                            <div>
                                <h1 className="text-lg font-bold">E-Crayon</h1>
                                <p className="text-xs text-slate-500">
                                    Student information system
                                </p>
                            </div>
                        </div>

                        <div className="mb-9">
                            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-blue-400">
                                Welcome back
                            </p>

                            <h2 className="mt-3 text-3xl font-bold tracking-tight">
                                Sign in to your account
                            </h2>

                            <p className="mt-3 text-sm leading-6 text-slate-400">
                                Enter your details to continue to your academic dashboard.
                            </p>
                        </div>

                        <Form
                            {...AuthenticatedSessionController.store.form()}
                            resetOnSuccess={['password']}
                            className="flex flex-col gap-6"
                        >
                            {({ processing, errors }) => (
                                <>
                                    <div className="space-y-2">
                                        <Label
                                            htmlFor="email"
                                            className="text-sm font-medium text-slate-300"
                                        >
                                            Email address
                                        </Label>

                                        <div className="relative">
                                            <Mail className="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500" />

                                            <Input
                                                id="email"
                                                type="email"
                                                name="email"
                                                required
                                                autoFocus
                                                tabIndex={1}
                                                autoComplete="email"
                                                placeholder="email@example.com"
                                                className="h-12 rounded-xl border-white/[0.08] bg-[#111722] pl-11 text-white placeholder:text-slate-600 focus-visible:border-blue-500 focus-visible:ring-blue-500/20"
                                            />
                                        </div>

                                        <InputError message={errors.email} />
                                    </div>

                                    <div className="space-y-2">
                                        <div className="flex items-center justify-between">
                                            <Label
                                                htmlFor="password"
                                                className="text-sm font-medium text-slate-300"
                                            >
                                                Password
                                            </Label>

                                            {canResetPassword && (
                                                <TextLink
                                                    href={request()}
                                                    tabIndex={5}
                                                    className="text-xs font-medium text-blue-400 transition hover:text-blue-300"
                                                >
                                                    Forgot password?
                                                </TextLink>
                                            )}
                                        </div>

                                        <div className="relative">
                                            <LockKeyhole className="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500" />

                                            <Input
                                                id="password"
                                                type="password"
                                                name="password"
                                                required
                                                tabIndex={2}
                                                autoComplete="current-password"
                                                placeholder="Enter your password"
                                                className="h-12 rounded-xl border-white/[0.08] bg-[#111722] pl-11 text-white placeholder:text-slate-600 focus-visible:border-blue-500 focus-visible:ring-blue-500/20"
                                            />
                                        </div>

                                        <InputError message={errors.password} />
                                    </div>

                                    <div className="flex items-center gap-3">
                                        <Checkbox
                                            id="remember"
                                            name="remember"
                                            tabIndex={3}
                                            className="border-slate-600 data-[state=checked]:border-blue-500 data-[state=checked]:bg-blue-500"
                                        />

                                        <Label
                                            htmlFor="remember"
                                            className="cursor-pointer text-sm text-slate-400"
                                        >
                                            Remember me
                                        </Label>
                                    </div>

                                    <Button
                                        type="submit"
                                        tabIndex={4}
                                        disabled={processing}
                                        className="group h-12 w-full rounded-xl bg-gradient-to-r from-blue-600 to-violet-600 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:from-blue-500 hover:to-violet-500"
                                    >
                                        {processing ? (
                                            <LoaderCircle className="h-4 w-4 animate-spin" />
                                        ) : (
                                            <>
                                                Sign in to account
                                                <ArrowRight className="ml-2 h-4 w-4 transition group-hover:translate-x-1" />
                                            </>
                                        )}
                                    </Button>

                                    <div className="pt-2 text-center text-sm text-slate-500">
                                        Don't have an account?{' '}
                                        <TextLink
                                            href={register()}
                                            tabIndex={5}
                                            className="font-semibold text-blue-400 transition hover:text-blue-300"
                                        >
                                            Create an account
                                        </TextLink>
                                    </div>
                                </>
                            )}
                        </Form>

                        {status && (
                            <div className="mt-5 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-center text-sm font-medium text-green-400">
                                {status}
                            </div>
                        )}

                        <div className="mt-8 border-t border-white/[0.06] pt-5 text-center">
                            <p className="text-xs text-slate-600">
                                Secure access to your E-Crayon account
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}