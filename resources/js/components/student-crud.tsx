import axios from 'axios';
import { useEffect, useMemo, useState } from 'react';

type Student = {
    id: number;
    nev: string;
    osztaly: string;
    fiu: boolean | number;
};

type StudentForm = {
    nev: string;
    osztaly: string;
    fiu: boolean;
};

const emptyForm: StudentForm = { nev: '', osztaly: '', fiu: false };

export default function StudentCrud() {
    const [students, setStudents] = useState<Student[]>([]);
    const [search, setSearch] = useState('');
    const [form, setForm] = useState<StudentForm>(emptyForm);
    const [editing, setEditing] = useState<Student | null>(null);
    const [modalOpen, setModalOpen] = useState(false);
    const [loading, setLoading] = useState(true);
    const [saving, setSaving] = useState(false);
    const [error, setError] = useState('');
    const [fieldErrors, setFieldErrors] = useState<Record<string, string>>({});

    const filteredStudents = useMemo(() => {
        const query = search.trim().toLowerCase();
        if (!query) return students;
        return students.filter((student) =>
            [student.id.toString(), student.nev, student.osztaly]
                .some((value) => value.toLowerCase().includes(query)),
        );
    }, [students, search]);

    async function loadStudents() {
        setLoading(true);
        setError('');
        try {
            const response = await axios.get('/students/data');
            setStudents(response.data.data ?? response.data);
        } catch {
            setError('The student list could not be loaded. Please refresh the page.');
        } finally {
            setLoading(false);
        }
    }

    useEffect(() => {
        void loadStudents();
    }, []);

    function openCreate() {
        setEditing(null);
        setForm(emptyForm);
        setFieldErrors({});
        setError('');
        setModalOpen(true);
    }

    function openEdit(student: Student) {
        setEditing(student);
        setForm({ nev: student.nev, osztaly: student.osztaly, fiu: Boolean(student.fiu) });
        setFieldErrors({});
        setError('');
        setModalOpen(true);
    }

    function closeModal() {
        if (saving) return;
        setModalOpen(false);
        setEditing(null);
        setForm(emptyForm);
        setFieldErrors({});
    }

    async function saveStudent(event: React.FormEvent<HTMLFormElement>) {
        event.preventDefault();
        setSaving(true);
        setFieldErrors({});
        setError('');
        try {
            const payload = { ...form, fiu: form.fiu ? 1 : 0 };
            if (editing) {
                await axios.put(`/students/${editing.id}`, payload);
            } else {
                await axios.post('/students', payload);
            }
            setModalOpen(false);
            setEditing(null);
            setForm(emptyForm);
            await loadStudents();
        } catch (exception: any) {
            if (exception.response?.status === 422) {
                const errors = exception.response.data.errors ?? {};
                setFieldErrors(Object.fromEntries(
                    Object.entries(errors).map(([key, messages]) => [key, Array.isArray(messages) ? messages[0] : String(messages)]),
                ));
            } else {
                setError(exception.response?.data?.message ?? 'The operation failed. Please try again.');
            }
        } finally {
            setSaving(false);
        }
    }

    async function deleteStudent(student: Student) {
        if (!window.confirm(`Delete ${student.nev} from the student list?`)) return;
        setError('');
        try {
            await axios.delete(`/students/${student.id}`);
            await loadStudents();
        } catch {
            setError('The student could not be deleted. Please try again.');
        }
    }

    return (
        <section className="ec-students-section">
            <div className="container">
                <div className="ec-students-header">
                    <div>
                        <span className="ec-section-label">Administration</span>
                        <h1>Students</h1>
                        <p>Manage student records and class information.</p>
                    </div>
                    <button type="button" className="ec-students-add-button" onClick={openCreate}>
                        <span>+</span> Add student
                    </button>
                </div>

                <div className="ec-students-card">
                    <div className="ec-students-card-header">
                        <div>
                            <h2>Student directory</h2>
                            <p>{students.length} registered student{students.length === 1 ? '' : 's'}</p>
                        </div>
                    </div>

                    <div className="ec-react-toolbar">
                        <label className="ec-react-search">
                            Search students
                            <input
                                type="search"
                                value={search}
                                onChange={(event) => setSearch(event.target.value)}
                                placeholder="Name, class or ID…"
                            />
                        </label>
                        <span className="ec-react-result-count">{filteredStudents.length} result{filteredStudents.length === 1 ? '' : 's'}</span>
                    </div>

                    {error && <div className="ec-react-error-banner" role="alert">{error}</div>}

                    <div className="ec-students-table-wrapper">
                        <table className="ec-students-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student name</th>
                                    <th>Class</th>
                                    <th>Gender</th>
                                    <th className="ec-students-actions-heading">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {loading ? (
                                    <tr><td colSpan={5} className="ec-react-loading">Loading student records…</td></tr>
                                ) : filteredStudents.length === 0 ? (
                                    <tr>
                                        <td colSpan={5}>
                                            <div className="ec-students-empty">
                                                <div className="ec-students-empty-icon">👥</div>
                                                <h3>{search ? 'No matching students' : 'No students found'}</h3>
                                                <p>{search ? 'Try another search term.' : 'Add your first student to get started.'}</p>
                                                {!search && <button type="button" className="ec-students-add-button" onClick={openCreate}>Add student</button>}
                                            </div>
                                        </td>
                                    </tr>
                                ) : filteredStudents.map((student) => (
                                    <tr key={student.id}>
                                        <td><span className="ec-student-id">{student.id}</span></td>
                                        <td>
                                            <div className="ec-student-name-cell">
                                                <div className="ec-student-avatar">{student.nev.trim().charAt(0).toUpperCase()}</div>
                                                <span>{student.nev}</span>
                                            </div>
                                        </td>
                                        <td><span className="ec-student-class">{student.osztaly}</span></td>
                                        <td><span className="ec-student-gender">{student.fiu ? 'Boy' : 'Girl'}</span></td>
                                        <td>
                                            <div className="ec-students-actions">
                                                <button type="button" className="ec-student-edit-button" onClick={() => openEdit(student)}>Edit</button>
                                                <button type="button" className="ec-student-delete-button" onClick={() => void deleteStudent(student)}>Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {modalOpen && (
                <div className="ec-react-modal-backdrop" role="presentation" onMouseDown={(event) => event.target === event.currentTarget && closeModal()}>
                    <div className="ec-react-modal" role="dialog" aria-modal="true" aria-labelledby="student-modal-title">
                        <div className="ec-react-modal-header">
                            <div>
                                <span className="ec-section-label">Student information</span>
                                <h2 id="student-modal-title">{editing ? 'Edit student' : 'Add a new student'}</h2>
                            </div>
                            <button type="button" className="ec-react-modal-close" onClick={closeModal} aria-label="Close dialog">×</button>
                        </div>
                        <form className="ec-react-form" onSubmit={saveStudent}>
                            <label>
                                Full name
                                <input value={form.nev} onChange={(event) => setForm((current) => ({ ...current, nev: event.target.value }))} placeholder="Enter student's name" required maxLength={255} />
                                {fieldErrors.nev && <span className="ec-react-error">{fieldErrors.nev}</span>}
                            </label>
                            <label>
                                Class
                                <input value={form.osztaly} onChange={(event) => setForm((current) => ({ ...current, osztaly: event.target.value }))} placeholder="e.g. 12/A" required maxLength={255} />
                                {fieldErrors.osztaly && <span className="ec-react-error">{fieldErrors.osztaly}</span>}
                            </label>
                            <label className="ec-react-checkbox-label">
                                <input type="checkbox" checked={form.fiu} onChange={(event) => setForm((current) => ({ ...current, fiu: event.target.checked }))} />
                                Boy
                            </label>
                            {fieldErrors.fiu && <span className="ec-react-error">{fieldErrors.fiu}</span>}
                            {error && <div className="ec-react-error-banner" role="alert">{error}</div>}
                            <div className="ec-react-form-actions">
                                <button type="button" className="ec-student-cancel-button" onClick={closeModal} disabled={saving}>Cancel</button>
                                <button type="submit" className="ec-students-add-button" disabled={saving}>{saving ? 'Saving…' : editing ? 'Save changes' : 'Create student'}</button>
                            </div>
                        </form>
                    </div>
                </div>
            )}
        </section>
    );
}
